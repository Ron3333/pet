<?php

namespace App\Livewire\Pets;


use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Carbon\CarbonImmutable;
use Livewire\Component;
use App\Models\Pet;


#[Layout('layouts.app')] 
class Cita extends Component
{
    use WithFileUploads;
    
    public  $pets;
    public  $petId = [];
    public  $observaciones = '';
    public  $tipo_de_grooming = '';
    public  $nudos = '';
    public  $fecha ;
    public  $dias ;
    public  $fecha_cita ;
    public  $mensaje ;
    public  $foto_pago;

    public function render()
    {        
        return view('livewire.pets.cita');    
    }

    public function  mount(){

         $dias = collect(range(1, 7));

        foreach ( $dias as $key => $value) {
             $hoy = CarbonImmutable::now();
             $this->fecha = $hoy->startOfWeek();
             $this->dias[$key]=['dia'=> $value, 'fecha'=>$this->fecha->add($value-1, 'day')];
        }

        if (Auth::check()) {
            $id = Auth::id();
         }

    	   $this->pets = Pet::where('user_id', $id )
    				     ->orderBy('id','ASC')
    				     ->get(); 
       
    }

    public function crearCita(){

        $this->validate([
                'petId' =>'required',
                'observaciones' => 'required',
                'tipo_de_grooming' => 'required',
                'nudos' => 'required',
                  ]);

        if(!isset($this->fecha_cita)){
            $this->mensaje="Selecciones una fecha para la cita";
            return;
        }

        $this->fecha_cita="";
        $this->dispatch('open-modal', 'confirm-pay');
        //return redirect()->to('/dashboard');

               
    }

     public function next()
    {
        $this->dias = collect(range(1, 7));
        $this->fecha = $this->fecha->endOfWeek();
        foreach ( $this->dias as $key => $value) {  
             $this->dias[$key]=['dia'=> $value, 'fecha'=>$this->fecha->add($value, 'day')];
        }

        $this->fecha=$this->dias[6]['fecha'];

    }

    public function previous()
    {
        $this->dias = collect(range(7, 1));
        $this->fecha = $this->fecha->startOfWeek();
        foreach ( $this->dias as $key => $value) {       
             $this->dias[$key]=['dia'=> $value, 'fecha'=>$this->fecha->sub($value, 'day')];  
        }
        $this->fecha=$this->dias[6]['fecha'];

    }

    public function cita($fecha){
        $this->fecha_cita = $fecha;
        
    }

    public function confirmaPay(){

        $this->validate([
                
                'foto_pago' => 'required|image|max:2048'
         ]);

         $namephoto = md5($this->foto_pago . microtime()).'.'.$this->foto_pago->extension();
         $this->foto_pago->storeAs('foto_pago', $namephoto);
         $this->reset('petId','observaciones','tipo_de_grooming','nudos','fecha_cita');
         return redirect()->to('/dashboard');

    }

}
