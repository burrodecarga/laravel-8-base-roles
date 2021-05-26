<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Requirement;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        //dd($course->requirements);
        return view('courses.show',compact('course'));
    }
}
