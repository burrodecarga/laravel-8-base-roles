<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::where('status',2)->paginate(10);
        return view('admin.courses.index',compact('courses'));
    }

    public function show(Course $course){

        //return $course->status;
        return $this->authorize("revision",$course);

        return view('admin.courses.show',compact('course'));
    }

    public function aproved(Course $course){

       $this->authorize('revision');

        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
            return back()->with('info','Curso incompleto, no se puede publicar');
        }
       $course->status = 3;
       $course->save();
       return redirect()->route('admin.courses')->with('info','El curso se aprobó satisfactoriamente');
    }
}
