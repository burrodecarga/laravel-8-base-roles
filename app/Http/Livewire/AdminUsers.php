<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $users = User::where('name','like','%'.$this->search.'%')
        ->orWhere('email','like','%'.$this->search.'%')
        ->paginate(5);
        return view('livewire.admin-users',compact('users'));
    }


}
