<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function isEnrolled(User $user,Course $course)
    {
        return ($course->students->contains($user->id))?true:$this->notAuthorized();
    }

    public function published(?User $user,Course $course){
        return ($course->status==3)? true:$this->notAuthorized();}


        public function dictated(User $user,Course $course){

            return ($course->user_id == $user->id)? true:$this->notAuthorized();
        }

        public function revision(User $user, Course $course){
            return ($course->status==2)? false:$this->notAuthorized();
        }
}
