<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Enroll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EnrollController extends Controller
{
    public function addProduct(Request $request){
        $data = [
           'pageTitle'=>'Your Schedule',
           'enrolls'=>Enroll::orderBy('subject_code','asc')->get()
        ];
        return view('back.pages.student.add-product',$data);
     } //End Method

     public function editProduct(Request $request){
      $categories = Category::all();
      return view('back.pages.student.edit-product',compact('categories'));
     }//end method
     public function updateProduct(Request $request)
     {
         $selectedSubjects = json_decode($request->input('selected_subjects'), true);
         if (empty($selectedSubjects)) {
            return redirect()->back()->with('fail', 'No subjects selected for enrollment.');
        }
    
        $studentId = Auth::id(); 
         // Process each selected subject
         foreach ($selectedSubjects as $subjectId) {
             // Here you would typically update or create an enrollment record
             // For example:
             Enroll::updateOrCreate(
                 ['student_id' => auth()->id(), 'subject_id' => $subjectId],
                 ['enrolled_at' => now()]
             );
         }

         return redirect()->back()->with('success', 'Subjects enrolled successfully!');
     }//end method
     
     public function addSubject(Request $request)
     {
         $subjectId = $request->input('subject_id');
         $userId = auth()->id(); // Assuming the user is logged in
     
         // Check if the subject is already added for this user
         $existingSubject = SelectedSubject::where('user_id', $userId)
                                           ->where('subject_id', $subjectId)
                                           ->first();
     
         if (!$existingSubject) {
             // Add the subject to the selected subjects table
             SelectedSubject::create([
                 'user_id' => $userId,
                 'subject_id' => $subjectId,
             ]);
     
             return response()->json(['success' => true]);
         }
     
         return redirect()->back()->with('error', 'Subject already added.');
     }//end method

     public function saveEnrollment(Request $request)
     {
         $subjects = json_decode($request->input('subjects'), true);
 
         if (empty($subjects)) {
             return response()->json(['message' => 'No subjects selected'], 400);
         }
 
         try {
             // Assuming you have a user authentication system
             $studentId = auth()->id();
 
             foreach ($subjects as $subject) {
                 Enroll::create([
                     'student_id' => $studentId,
                     'subject_id' => $subject['id'],
                     'subject_code' => $subject['code'],
                     'subject_name' => $subject['name'],
                     'subject_time' => $subject['time'],
                     'subject_room' => $subject['room'],
                     'subject_block' => $subject['block'],
                     'subject_day' => $subject['day'],
                     'year_level' => $subject['year'],
                 ]);
             }
 
             return response()->json(['message' => 'Enrollment saved successfully'], 200);
         } catch (\Exception $e) {
             return response()->json(['message' => 'Error saving enrollment: ' . $e->getMessage()], 500);
         }
     }//end method
}
