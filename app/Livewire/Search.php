<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class Search extends Component
{
    public $value = '';
    public function render(){

        return view('livewire.search' , [
            'users' => User::search($this->value)
        ]);
    }
}
