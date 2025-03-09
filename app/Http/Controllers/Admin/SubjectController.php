<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Student;
use App\Models\Enroll;
use App\Models\SubCategory;
use Livewire\WithPagination;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class SubjectController extends Controller
{
    use WithPagination;

    public $categoriesPerPage = 6;

    public function catSubcatList(Request $request){
        $data = [
            'pageTitle'=>'Subject Management & Assign categories management'
        ];
        return view('back.pages.admin.cats-subcats-list',$data);
    }
    public function addCategory(Request $request){
        $categories = Category::all();
        $data = [
            'pageTitle'=>'Add Subject'
        ];
        $categories = Category::paginate(10);
        return view('back.pages.admin.add-category',$data,compact('categories'));
    }

    public function storeCategory(Request $request){
        //VALIDATE THE FORM
        $request->validate([
            'subject_code' => 'required',
            'subject_name' => 'required',
            'subject_time' => 'required',
            'subject_room' => 'required',
            'subject_block' => 'required',
            'subject_day' => 'required',
            'year_level' => 'required|min:1|max:4',
        ],[
            'subject_code.required'=>':Attribute is required',
            'subject_code.min'=>':Attribute must contains atleast 5 characters',
            'subject_code.unique'=>'This :attribute is already exists',     
            'subject_name.required'=>':Attribute is required',
            'subject_name.min'=>':Attribute must contains atleast 5 characters',
            'subject_name.unique'=>'This :attribute is already exists',  
            'subject_time.required'=>':Attribute is required',
                         
            'subject_room.required'=>':Attribute is required',
            'subject_room.min'=>':Attribute must contains atleast 5 characters',
            
            'subject_block.required'=>':Attribute is required',
            'subject_block.min'=>':Attribute must contains atleast 5 characters',
            
            'subject_day.required'=>':Attribute is required',
            'subject_day.min'=>':Attribute must contains atleast 5 characters',
                   
        ]);
               
                //Save category into Database
                $category = new Category();
                $category->subject_code = $request->subject_code;
                $category->subject_name = $request->subject_name;
                $category->subject_time = $request->subject_time;
                $category->subject_room = $request->subject_room;             
                $category->subject_block = $request->subject_block;
                $category->subject_day = $request->subject_day; 
                $category->year_level = $request->year_level;              
                $saved = $category->save();

                if( $saved ){
                    return redirect()->back()->with('success','<b>'.ucfirst($request->subject_name).'</b> '.ucfirst($request->subject_block).'</b> Subject has been successfully added.');
                }else{
                    return redirect()->route()->with('fail','Something went wrong. Try again later.');
                }                    
    }
    public function editCategory(Request $request){
        $category_id = $request->id;
        $category = Category::findOrFail($category_id);
        $data = [
            'pageTitle'=>'Edit Category',
            'category'=>$category
        ];
        return view('back.pages.admin.edit-category',$data);
    }
    public function updateCategory(Request $request){
        $category_id = $request->category_id;
        $category = Category::findOrFail($category_id);
        $request->validate([
            'subject_code' => 'required|min:5',
            'subject_name' => 'required|min:2',
            'subject_time' => 'required',
            'subject_room' => 'required',
            'subject_block' => 'required',
            'subject_day' => 'required',
            'year_level' => 'required|integer|min:1|max:4',
        ],[
            'subject_code.required'=>':Attribute is required',
            'subject_code.min'=>':Attribute must contains atleast 5 characters',
            'subject_code.unique'=>'This :attribute is already exists',     
            'subject_name.required'=>':Attribute is required',
            'subject_name.min'=>':Attribute must contains atleast 5 characters',
            'subject_name.unique'=>'This :attribute is already exists',  
            'subject_time.required'=>':Attribute is required',
                         
            'subject_room.required'=>':Attribute is required',
            'subject_room.min'=>':Attribute must contains atleast 5 characters',
            
            'subject_block.required'=>':Attribute is required',
            'subject_block.min'=>':Attribute must contains atleast 5 characters',
            
            'subject_day.required'=>':Attribute is required',
            'subject_day.min'=>':Attribute must contains atleast 5 characters',

            'year_level.required'=>':Attribute is required',
            'year_level.min'=>':Attribute must contains atleast fill',
                   
        ]);
               
                //Update category into Database
                $category->subject_code = $request->subject_code;
                $category->subject_name = $request->subject_name;
                $category->subject_time = $request->subject_time;
                $category->subject_room = $request->subject_room;             
                $category->subject_block = $request->subject_block;
                $category->subject_day = $request->subject_day;     
                $category->year_level = $request->year_level;           
                $saved = $category->save();

                if( $saved ){
                    return redirect()->back()->with('success','<b>'.ucfirst($request->subject_name).'</b> Subject has been successfully Update.');
                }else{
                    return redirect()->route()->with('fail','Something went wrong. Try again later.');
                }                 
    }//end method

    public function viewStudent(Request $request){
        $students = Student::all();
        return view('back.pages.admin.view-student', compact('students'));
    }//end method

    public function index()
{
    $categories = Category::paginate(10); // 10 is the number of items per page
    return view('back.pages.admin.add-category', compact('categories'));
}//end 
        
}
