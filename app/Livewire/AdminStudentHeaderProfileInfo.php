<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AdminStudentHeaderProfileInfo extends Component
{
    public $admin;
    public $student;

    public $listeners = [
        'updateAdminStudentHeaderInfo'=>'$refresh'
    ];

    public function mount(){
        if( Auth::guard('admin')->check() ){
            $this->admin = Admin::findOrFail(auth()->id());
        }
        if( Auth::guard('student')->check() ){
            $this->student = Student::findOrFail(auth()->id());
        }
    }
    public function render()
    {
        return view('livewire.admin-student-header-profile-info');
    }
}
