<?php

namespace App\Livewire\Pets;


use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Carbon\CarbonImmutable;
use App\Models\Pregrooming;
use App\Models\Grooming;
use Livewire\Component;
use App\Models\Pet;


#[Layout('layouts.app')] 
class Cita extends Component
{
    use WithFileUploads;
    
    public  $pets;
    public  $petId;
    public  $observaciones = '';
    public  $tipo_de_grooming = '';
    public  $nudos = '';
    public  $fecha ;
    public  $dias ;
    public  $fecha_cita ;
    public  $mensaje ;
    public  $foto_pago;
    public  $hora_cita = false;
    public  $cita ;

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

         if(!isset($this->cita)){
            $this->mensaje="Selecciones una fecha para la cita";
            return;
        }

        $this->validate([
                'petId' =>'required',
                'observaciones' => 'required',
                'tipo_de_grooming' => 'required',
                'nudos' => 'required',
                'cita' => 'required',
                  ]);



        $pet =  Pet::where('id', $this->petId )->first();

        if($this->tipo_de_grooming == 'fullGrooming'){
           $precio=50;
        }elseif ($this->tipo_de_grooming == 'fullGroomingPlus') {
            $precio=50;
        }elseif ($this->tipo_de_grooming == 'sanitario') {
            $precio=40;
        }elseif ($this->tipo_de_grooming == 'solo') {
            $precio=35;
        }elseif ($this->tipo_de_grooming == 'corte') {
            $precio=10;
        }

        $pregrooming = new Pregrooming;
        $pregrooming->depósito_inicial = $precio;
        $pregrooming->fecha = $this->cita;
        $pregrooming->nudos = $this->nudos;
        $pregrooming->observaciones = $this->observaciones ;
        $pregrooming->perro = $pet->nombre ;
        $pregrooming->tipo_groming = $this->tipo_de_grooming;
        $pregrooming->save();

        //$this->fecha_cita="";
        //$this->cita="";
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

    public function dia($fecha){

        //$this->fecha_cita = date("d", strtotime($fecha));
        $this->fecha_cita = $fecha;
        $this->hora_cita = true;
        $this->cita="";

    }

    public function fechaCita($fecha, $hora){

       
        $fecha = date("d-M-Y", strtotime($fecha));

        $this->cita = $fecha.' : '.$hora;
 
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
