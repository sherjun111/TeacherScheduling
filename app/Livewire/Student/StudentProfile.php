<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentProfile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    public $name, $email, $username, $phone, $address, $course, $age, $birthday, $studentid;
    public $current_password, $new_password, $new_password_confirmation;

    protected $queryString = ['tab'=>['keep'=>true]];

    protected $listeners = [
        'updateStudentProfilePage'=>'$refresh'
    ];
    public function selectTab($tab){
        $this->tab = $tab;
    }

    public function mount(){
       $this->tab = request()->tab ? request()->tab : $this->tabname;

       //POPULATE
       $student = Student::findOrFail(auth('student')->id());
       $this->name = $student->name;
       $this->email = $student->email;
       $this->username = $student->username;
       $this->phone = $student->phone;
       $this->course = $student->course;
       $this->age = $student->age;
       $this->birthday = $student->birthday;
       $this->studentid = $student->studentid;
       $this->address = $student->address;
    }

    public function updateStudentPersonalDetails(){
        //Validate the form
        $this->validate([
            'name'=>'required|min:5',
            'email'=>'required|min:5|unique:students,email,'.auth('student')->id(),    
            'username'=>'nullable|min:5|unique:students,username,'.auth('student')->id(),
            'address'=>'required|min:5',
            'phone'=>'required|min:11|unique:students,phone,'.auth('student')->id(),
            'course'=>'required',
            'age'=>'required',
            'birthday'=>'required|min:5',    
                 
        ]);
        $student = Student::findOrFail(auth('student')->id());
        $student->name = $this->name;
        $student->email = $this->email;
        $student->username = $this->username;
        $student->address = $this->address;
        $student->phone = $this->phone;
        $student->course = $this->course;
        $student->age = $this->age;
        $student->birthday = $this->birthday;
        $update = $student->save();

        if( $update ){
            $this->dispatch('updateAdminStudentHeaderInfo');
            $this->showToastr('success','Personal Details have been successfully updated.');
        }else{
            $this->showToastr('error','Something went wrong.');
        }
    }

    public function updatePassword(){
        $student = Student::findOrFail(auth('student')->id());

        //Validate the form
        $this->validate([
            'current_password'=>[
                'required',
                function($attribute, $value, $fail) use ($student){
                    if( !Hash::check($value, $student->password) ){
                        return $fail(__('The current password is incorrect.'));
                    }
                }
            ],
            'new_password'=>'required|min:5|max:45|confirmed'
        ]);

        //Update password
        $update = $student->update([
            'password'=>Hash::make($this->new_password)
        ]);

        if( $update ){
           //Send email notification to student that contains new password
           $data['student'] = $student;
           $data['new_password'] = $this->new_password;

           $mail_body = view('email-templates.student-reset-email-template',$data);

           $mailConfig = array(
              'mail_from_email'=>env('EMAIL_FROM_ADDRESS'),
              'mail_from_name'=>env('EMAIL_FROM_NAME'),
              'mail_recipient_email'=>$student->email,
              'mail_recipient_name'=>$student->name,
              'mail_subject'=>'Password changed',
              'mail_body'=>$mail_body
           );

           sendEmail($mailConfig);
           $this->current_password = null;
           $this->new_password = null;
           $this->new_password_confirmation = null;
           $this->showToastr('success','Password successfully updated.');
        }else{
            $this->showToastr('error','Something went wrong.');
        }
    }

    public function showToastr($type, $message){
        return $this->dispatch('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function render()
    {
        return view('livewire.student.student-profile',[
            'student'=>Student::findOrFail(auth('student')->id())
        ]);
    }
}
