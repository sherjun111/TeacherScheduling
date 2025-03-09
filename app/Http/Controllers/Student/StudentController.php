<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Enroll;
use App\Models\Category;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use constGuards;
use constDefaults;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Kropify;
use App\Models\Shop;

class StudentController extends Controller
{
    public function login(Request $request){
        $data = [
            'pageTitle'=>'Student Login'
        ];
        return view('back.pages.student.auth.login',$data);
    } //End Method
    public function register(Request $request)
    {
        $data = [
            'pageTitle'=>'Create Student Account'
        ];
        return view('back.pages.student.auth.register',$data);
    } //End Method

    public function home(Request $request)
    {
        $data = [
            'pageTitle'=>'Student Dashboard'
        ];
        return view('back.pages.student.home',$data);
    } //End Method
    
    public function createStudent(Request $request)
    {
        $request->validate([
            'studentid'=>'required|unique:students',
            'name'=>'required',
            'username'=>'required|unique:students',
            'email'=>'required|email|unique:students',           
            'password'=>'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password'=>'min:5',
            'address'=>'required|min:5',
            'year'=>'required|',
            'course'=>'required|min:4',
            'age'=>'required',
            'birthday'=>'required',
            'phone'=>'required|min:11'            
        ]);
        $student = new Student();
        $student->studentid = $request->studentid;       
        $student->name = $request->name;  
        $student->username = $request->username;      
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->address = $request->address;
        $student->year = $request->year;
        $student->course = $request->course;
        $student->age = $request->age;
        $student->birthday = $request->birthday;
        $student->phone = $request->phone;
        $saved = $student->save();

        if ( $saved ){
        //Generate token
        $token = base64_encode(Str::random(64));

        VerificationToken::create([
           'user_type'=>'student',
           'email'=>$request->email,
           'token'=>$token
        ]);

         $actionLink = route('student.verify',['token'=>$token]);
           $data['action_link'] = $actionLink;
           $data['student_name'] = $request->name;
           $data['student_email'] = $request->email;

           //Send Activation link to this student email
           $mail_body = view('email-templates.student-verify-template',$data)->render();

           $mailConfig = array(
              'mail_from_email'=>env('EMAIL_FROM_ADDRESS'),
              'mail_from_name'=>env('EMAIL_FROM_NAME'),
              'mail_recipient_email'=>$request->email,
              'mail_recipient_name'=>$request->name,
              'mail_subject'=>'Verify Student Account',
              'mail_body'=>$mail_body
           );

           if( sendEmail($mailConfig) )
           {
              return redirect()->route('student.register-success');
           }else
           {
             return redirect()->route('student.register')->with('fail','Something went wrong while sending verification link.');
           }
        }else
        {
            return redirect()->route('student.register')->with('fail','Something went wrong.');
        }
    }//end method
    public function verifyAccount(Request $requet, $token){
        $verifyToken = VerificationToken::where('token',$token)->first();

        if( !is_null($verifyToken) ){
            $student = Student::where('email',$verifyToken->email)->first();

            if( !$student->verified ){
                $student->verified = 1;
                $student->email_verified_at = Carbon::now();
                $student->save();

                return redirect()->route('student.login')->with('success','Good!, Your e-mail is verified. Login with your credentials and complete your account.');
            }else{
                return redirect()->route('student.login')->with('info','Your e-mail is already verified. You can now login.');
            }
        }else{
            return redirect()->route('student.register')->with('fail','Invalid Token.');
        }
    } //End Method
    public function loginHandler(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if( $fieldType == 'email' ){
            $request->validate([
                'login_id'=>'required|email|exists:students,email',
                'password'=>'required|min:5|max:45'
            ],[
                'login_id.required'=>'Email or Username is required.',
                'login_id.email'=>'Invalid email address.',
                'login_id.exists'=>'Email is not exists in system.',
                'password.required'=>'Password is required'
            ]);
        }else{
            $request->validate([
                'login_id'=>'required|exists:students,username',
                'password'=>'required|min:5|max:45'
            ],[
                'login_id.required'=>'Email or Username is required.',
                'login_id.exists'=>'Username is not exists in system.',
                'password.required'=>'Password is required'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if( Auth::guard('student')->attempt($creds) ){
            // return redirect()->route('seller.home');
            if( !auth('student')->user()->verified ){
                auth('student')->logout();
                return redirect()->route('student.login')->with('fail','Your account is not verified. Check in your Email and click on the link we had sent in order to verify your Email for student account.');
            }else{
                return redirect()->route('student.home');
            }
        }else{
            return redirect()->route('student.login')->withInput()->with('fail','Incorrect password.');
        }
    } //End Method

    public function logoutHandler(Request $request){
        Auth::guard('student')->logout();
        return redirect()->route('student.login')->with('fail','You are logged out!');
    } //End Method
    public function forgotPassword(Request $request){
       $data = [
        'pageTitle' => 'Forgot Password'
       ];
       return view('back.pages.student.auth.forgot',$data);
    } //End Method

    public function registerSuccess(Request $request){
        return view('back.pages.student.register-success');
    } //End Method

    public function sendPasswordResetLink(Request $request){
        //Validate the form
        $request->validate([
            'email'=>'required|email|exists:students,email'
        ],[
            'email.required'=>'The :attribute is required',
            'email.email'=>'Invalid email address',
            'email.exists'=>'The :attribute is not exists in our system'
        ]);
        //Get Student Details
        $student = Student::where('email',$request->email)->first();
        //Generate Token
        $token = base64_encode(Str::random(64));
        //checkif there os a existing Reset Password
        $oldToken = DB::table('password_reset_tokens')
                    ->where(['email'=>$student->email,'guard'=>constGuards::STUDENT])
                    ->first();
        if( $oldToken ){
            //UPDATE Existing Token.
            DB::table('password_reset_tokens')
                ->where(['email'=>$student->email,'guard'=>constGuards::STUDENT])
                ->update([
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
        }else{
                //INSERT NEW RESET PASSWORD TOKEN
                DB::table('password_reset_tokens')
                ->insert([
                    'email'=>$student->email,
                    'token'=>$token,
                    'guard'=>constGuards::STUDENT,
                    'created_at'=>Carbon::now()
                ]);
        }
        $actionLink = route('student.reset-password',['token'=>$token,'email'=>urlencode($student->email)]);
        $data['actionLink'] = $actionLink;
        $data['student'] = $student;
        $mail_body = view('email-templates.student-forgot-email-template',$data)->render();
        $mailConfig = array(
            'mail_from_email' => config('mail.from.address'),
            'mail_from_name' => config('mail.from.name'),
            'mail_recipient_email' => $student->email,
            'mail_recipient_name' => $student->name,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mail_body
        );
        if( sendEmail($mailConfig) ){
            return redirect()->route('student.forgot-password')->with('success','We have sent a password reset link to your email.');
        }else{
            return redirect()->route('student.forgot-password')->with('fail','Something went wrong while sending password reset link.');
        }
     }//end method
     public function showResetForm(Request $request, $token = null){
        //Check if token exists
        $get_token = DB::table('password_reset_tokens')
                       ->where(['token'=>$token,'guard'=>constGuards::STUDENT])
                       ->first();

        if( $get_token ){
           //Check if this token is not expired
           $diffMins = Carbon::createFromFormat('Y-m-d H:i:s',$get_token->created_at)->diffInMinutes(Carbon::now());

           if( $diffMins > constDefaults::tokenExpiredMinutes ){
             //When token is older that 15 minutes
             return redirect()->route('student.forgot-password',['token'=>$token])->with('fail','Token expired!. Request another reset password link.');
           }else{
            return view('back.pages.student.auth.reset')->with(['token'=>$token]);
           }
        }else{
            return redirect()->route('student.forgot-password',['token'=>$token])->with('fail','Invalid token!, request another reset password link.');
        }

    } //End Method

    public function resetPasswordHandler(Request $request){
      //Validate the form
      $request->validate([
         'new_password'=>'required|min:5|max:45|required_with:confirm_new_password|same:confirm_new_password',
         'confirm_new_password'=>'required'
      ]);

      $token = DB::table('password_reset_tokens')
                 ->where(['token'=>$request->token,'guard'=>constGuards::STUDENT])
                 ->first();

      //Get seller details
      $student = Student::where('email',$token->email)->first();

      //Update seller password
      Student::where('email',$student->email)->update([
         'password'=>Hash::make($request->new_password)
      ]);

      //Delete token record
      DB::table('password_reset_tokens')->where([
         'email'=>$student->email,
         'token'=>$request->token,
         'guard'=>constGuards::STUDENT
      ])->delete();

      //Send email to notify student for new password
      $data['student'] = $student;
      $data['new_password'] = $request->new_password;

      $mail_body = view('email-templates.student-reset-email-template',$data);

      $mailConfig = array(
        'mail_from_email'=>env('EMAIL_FROM_ADDRESS'),
        'mail_from_name'=>env('EMAIL_FROM_NAME'),
        'mail_recipient_email'=>$student->email,
        'mail_recipient_name'=>$student->name,
        'mail_subject'=>'Password Changed',
        'mail_body'=>$mail_body
      );

      sendEmail($mailConfig);
      return redirect()->route('student.login')->with('success','Done!, Your password has been changed. Use new password to login into system.');

    } //End Method
    public function profileView(Request $request){
        $data = [
            'pageTitle'=>'Profile'
        ];
        return view('back.pages.student.profile',$data);
    }//end method

    public function changeProfilePicture(Request $request)
{
    $student = Student::findOrFail(auth('student')->id());
    $path = 'images/users/students/';
    $file = $request->file('studentProfilePictureFile');
    $old_picture = $student->getAttributes()['picture'];
    $filename = 'STUDENT_IMG_' . $student->id . '.jpg';

    $upload = kropify::getFile($file, $filename)->maxWoH(325)->save($path);
    $infos = $upload->getInfo();

    if ($upload) {
        if ($old_picture != null && File::exists(public_path($path . $old_picture))) {
            File::delete(public_path($path . $old_picture));
        }

        // Update the student's picture in the database
        $student->update(['picture' => $infos->getName()]);

        // Save the image information to the database
        $kropifyImage = new \App\Models\KropifyImage([
            'user_id' => $student->id,
            'user_type' => 'student',
            'filename' => $infos->getName(),
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'path' => $path . $infos->getName(),
        ]);
        $kropifyImage->save();

        return response()->json([
            'status' => 1,
            'msg' => 'Your profile picture has been successfully updated.',
            'picture_url' => asset($path . $infos->getName())
        ]);
    } else {
        return response()->json(['status' => 0, 'msg' => 'Something went wrong.']);
    }
}//end method
public function render()
{
    return view('livewire.admin-subject-list',[
        'categories'=>Category::orderBy('ordering','asc')->paginate($this->categoriesPerPage,['*'],'categoriesPage')
        
    ]);
}//end method

    
}
