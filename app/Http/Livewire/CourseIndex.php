<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;
    public $category_id=1;
    public $level_id =2;

    public function render()
    {
        $categories = Category::all();
        $levels = level::all();
        $courses = Course::where('status',3)
                          ->category($this->category_id)
                          ->level($this->level_id)
                          ->latest('id')->paginate(2);

        return view('livewire.course-index',[
            'courses' =>$courses,
            'categories' =>$categories,
            'levels' =>$levels
        ]);
    }

    public function iniciar()
    {
        $this->reset();
    }


}
