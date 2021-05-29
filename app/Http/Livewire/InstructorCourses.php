<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorCourses extends Component
{

    use WithPagination;
    public $search;

    public function render()
    {
        $courses = Course::where('title','like','%'.$this->search.'%')
                     ->where('user_id',auth()->user()->id)->paginate(4);
        return view('livewire.instructor-courses',compact('courses'));
    }
}
