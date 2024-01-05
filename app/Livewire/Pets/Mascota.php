<?php

namespace App\Livewire\Pets;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')] 
class Mascota extends Component
{
	public $title = 'Post title...Estoy en linea';

	public $todos = [];
 
    public $todo = '';


    public function render()
    {
        return view('livewire.pets.mascota');
    }

    public function add()
    {
        $this->todos[] = $this->todo;
 
        //$this->todo = '';

        $this->reset('todo'); 
    }
}
