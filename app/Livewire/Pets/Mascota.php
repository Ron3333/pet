<?php

namespace App\Livewire\Pets;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use App\Models\Pet;
use Carbon\Carbon;


#[Layout('layouts.app')] 
class Mascota extends Component
{
	use WithFileUploads;

	public $nombre ='' ;
	public $apellido ='' ;
	public $raza ='' ;
	public $edad ='' ;
	public $meses ='' ;
	public $sexo ='' ;
	public $size ='' ;
	public $peso ='' ;
	public $actitud ='' ;
	public $socializa =[] ;
	public $muerde = '';
	public $info_adicional = '';
	public $foto = '';
    public $isDisabled = '';
    public $checked_socializa = '';
    public $block_social = true;
    public $social0 = '';
    public $social1 = '';
    public $social2 = '';
    public $social3 = '';

	
    public function mount()
    {
        $this->isDisabled = '' ;
        $this->checked_socializa = '' ;
        $this->block_social = true;

        if (Auth::check()) {
            $id = Auth::id();
            $user = User::find($id);
         }
         $this->apellido= $user->apellido;
    }
    public function render()
    {
        return view('livewire.pets.mascota');
    }

     public function createPet()
    {
    	
         
         $this->validate([
                'nombre' =>'required',
                'apellido' => 'required',
                'raza' => 'required',
                'edad' => 'required',
                'sexo' => 'required',
                'size' => 'required',
                'peso' => 'required',
                'actitud' => 'required',
                'socializa' => 'required',
                'muerde' => 'required',
                'foto' => 'required|image|max:2048'
         ]);
      

         if (Auth::check()) {
            $id = Auth::id();
         }

         $namephoto = md5($this->foto . microtime()).'.'.$this->foto->extension();
         $this->foto->storeAs('foto', $namephoto);

         /*if (count($this->socializa) > 0) {
           $socializa = implode(', ', $this->socializa);
         } else {
           $socializa = 'Sin datos';
         }*/

         if ( isset($this->socializa[0]) and  $this->socializa[0] == true) {
             $this->social0 = 'Personas ';
         }
         if( isset($this->socializa[1]) and $this->socializa[1] == true ) {
             $this->social1  = 'Perros ';
         }
         if( isset($this->socializa[2]) and $this->socializa[2] == true) {
             $this->social2 = 'Niños ';
         }
         if( isset($this->socializa[3]) and $this->socializa[3] == true) {
             $this->social3 = 'No socializa';
         }
         
        $currentDateTime = Carbon::now();
        $fecha_nac = Carbon::now()->subYear($this->edad)->subMonths($this->meses);
        $fecha_nac = date("M d, Y h:m a", strtotime($fecha_nac));
        
        $pet = new Pet;
        $pet->user_id = $id;
        $pet->nombre = $this->nombre;
        $pet->apellido = $this->apellido;
        $pet->raza = $this->raza;
        $pet->edad = $this->edad.' años y '.$this->meses.' meses';
        $pet->sexo = $this->sexo;
        $pet->size = $this->size;
        $pet->peso = $this->peso;
        $pet->fecha_nac = $fecha_nac;
        $pet->actitud = $this->actitud;
        $pet->socializa = $this->social0.' '.$this->social1.' '.$this->social2.' '.$this->social3;
        $pet->muerde = $this->muerde;
        $pet->foto = $namephoto;

        $pet->save();
       
      	$this->resetInputFields();

      	//$this->dispatch('creado');

        return redirect()->to('/dashboard');

    }

     private function resetInputFields(){
        $this->nombre = '';
        $this->apellido = '';
        $this->raza = '';
        $this->edad = '';
        $this->sexo = '';
        $this->size = '';
        $this->peso = '';
        $this->actitud = '';
        $this->socializa = '';
        $this->muerde = '';
        $this->foto = '';
    }

    public function blocksocializa(){
         
      if ($this->isDisabled == 'disabled' ) {
         $this->isDisabled = '';
         $this->block_social = true;
        
      }else{     
         $this->isDisabled = 'disabled'  ;
         $this->block_social = false;
         $this->socializa[0] = false  ;
         $this->socializa[1] = false  ;
         $this->socializa[2] = false  ;
        
          
      }
 
    }

     
   
}
