<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class AdminSubjectList extends Component
{
    use WithPagination;

    public $categoriesPerPage = 6;
    public $subcategoriesPerPage = 3;

    protected $listeners = [
        'updateCategoriesbooking',
        'deleteCategory'
       
    ];
    public function updateCategoriesbooking($positions){
        //dd($poistion);
          foreach($positions as $position){
          $index = $position[0];
        $newPosition = $position[1];
             Category::where('id',$index)->update([
                 'ordering'=>$newPosition
            ]);
          $this->showToastr('success','Subject ordering have been successfully updated.');
         }
     }
    public function showToastr($type,$message){
        return $this->dispatch('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function deleteCategory($category_id)
    {
        //delete file
       $category = Category::findOrFail($category_id);
       
        //delete from database
        $delete = $category->delete();
        if($delete){
            $this->showToastr('success','Subject deleted successfully');
        }else{
            $this->showToastr('error','Subject is Failed to delete ');
        }
    }
    
    public function render()
    {
        return view('livewire.admin-subject-list',[
            'categories'=>Category::orderBy('ordering','asc')->paginate($this->categoriesPerPage,['*'],'categoriesPage')
            
        ]);
    }
}
