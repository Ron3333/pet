<?php

namespace App\Livewire\Pets;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Pet;

class ListPet extends Component
{

	public  $pets;
   

    public function render()
    {
    

        return view('livewire.pets.list-pet');
    }

    public function  mount(){

        if (Auth::check()) {
            $id = Auth::id();
         }

    	$this->pets = Pet::where('user_id', $id )
    				     ->orderByDesc('id')
    				     ->get(); 
        /*dd($this->pets);
        exit();*/

    }

}
