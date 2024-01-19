<div class="py-12">
    <div class="max-w-5xl  mx-auto sm:px-6 lg:px-8 space-y-6">
    <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"> -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Citas') }} 
                    </h2>

                  
                </header>
                <form wire:submit="crearCita" class="mt-6 space-y-6">
                    <h4>Seleccione el perro para el grooming</h4><br>
                    <div>
                        <ul>
                            @foreach($pets as $pet)
                                 <li><input  wire:model="petId" type="radio"  value="{{$pet->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> 
                                 <b> {{ $pet->nombre }} </b> <img src="/foto/{{$pet->foto}}" width="50px" class="grooming" ></li>
                            @endforeach
                        </ul>
                        
                       <x-input-error :messages="$errors->get('petId')" class="mt-2" />
                      
                    </div>
                    <div>
                        <br>
                        <label for="observaciones" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Celos. heridas, comportamiento extraño, malestar. operaciones reciente, etc :</label>
                        <textarea wire:model="observaciones" name="observaciones" id="Observaciones" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Problemas de piel, de estomagom verrugas, heridas, etc..."></textarea> 
                        <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
                    </div>
                    <div>
                       
                       <x-input-label for="tipo_de_grooming" :value="__('Tipo de Grooming:')" />
                       <div class="flex items-center mb-4">
                            <input wire:model.live="tipo_de_grooming" id="full_grooming" type="radio" value="fullGrooming" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hembra" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Grooming</label>

                            &nbsp;&nbsp;&nbsp;

                            <input wire:model.live="tipo_de_grooming"  id="full_grooming_plus" type="radio" value="fullGroomingPlus" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="macho" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Grooming Plus</label>
                             &nbsp;&nbsp;&nbsp;
                             <input wire:model.live="tipo_de_grooming" id="sanitario" type="radio" value="sanitario" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hembra" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Baño Sanitario</label>
                             &nbsp;&nbsp;&nbsp;
                             <input wire:model.live="tipo_de_grooming" id="solo" type="radio" value="solo" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hembra" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Solo Baño</label>
                             &nbsp;&nbsp;&nbsp;
                             <input wire:model.live="tipo_de_grooming" id="corte" type="radio" value="corte" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hembra" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Corte de Uñas</label>
                        </div>
                        
                          @if(  $tipo_de_grooming == "fullGrooming" )

                          <h2 style="color: orange;">Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado y Corte de la raza o Personalizado</h2>
                          <h2 style="color: blue;"><b>Precio $50</b></h2>

                          @elseif( $tipo_de_grooming == "fullGroomingPlus" )

                          <h2 style="color: orange;">Full Grooming Plus: Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado y Corte de pelo mas elaborado. Ejemplo: Corte Asian Fusion.</h2>
                          <h2 style="color: blue;"><b>Precio $50</b></h2>

                          @elseif( $tipo_de_grooming == "sanitario" )

                          <h2 style="color: orange;">Baño sanitario: Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado, Despeje de huellas, Redondeo de Patas, Despeje de Ojos, Despeje de Zonas Nobles (Zonas Íntimas).</h2>
                          <h2 style="color: blue;"><b>Precio $40</b></h2>

                          @elseif( $tipo_de_grooming == "solo" )

                          <h2 style="color: orange;">Solo Baño : Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño y Secado.</h2>
                          <h2 style="color: blue;"><b>Precio $35</b></h2>

                          @elseif( $tipo_de_grooming == "corte" )

                          <h2 style="color: orange;">Corte de uñas: Corte de Uñas y Limado de Uñas.</h2>
                          <h2 style="color: blue;"><b>Precio $10</b></h2>

                          @endif
                        <x-input-error :messages="$errors->get('tipo_de_grooming')"  class="mt-2" />
                            <!-- <h3>Tipo de Grooming </h3><h3 x-text="$wire.tipo_de_grooming"></h3> -->
                        <br><br>

                    <div>
                       
                       <x-input-label for="nudos" :value="__('Tiene Nudos:')" />
                       <div class="flex items-center mb-4">
                            <input wire:model="nudos" id="si_nudo" type="radio" value="si" name="nudos" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hembra" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SI</label>

                            &nbsp;&nbsp;&nbsp;

                            <input wire:model="nudos"  id="no_nudo" type="radio" value="full_grooming_plus" name="nudos" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="macho" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>       
                       </div>
                        <x-input-error :messages="$errors->get('nudos')"  class="mt-2" />
                    </div>
                    <div align="center">
                        <h1>CALENDARIO</h1><br>
                        <div>
                            <div>
                                <button wire:click.prevent="previous" class="bg-gray-800 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l">Prev</button>&nbsp;&nbsp;&nbsp;
                           
                                <button wire:click.prevent="next" class="bg-gray-800 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l">Next</button>
                            </div>
                        </div><br>
                        <center><h2><b>{{ $dias[0]['fecha']->format('F , Y') }}</b></h2></center>
                        
                        <table>
                            <tr class="bg-gray-100">
                                <td class="border px-4 py-2" >Lunes</td>
                                <td class="border px-4 py-2" >Martes</td>
                                <td class="border px-4 py-2" >Miercoles</td>
                                <td class="border px-4 py-2" >Jueves</td>
                                <td class="border px-4 py-2" >Viernes</td>
                                <td class="border px-4 py-2" >Sábado</td>
                                <td class="border px-4 py-2" >Domingo</td>
                            </tr>
                            <tr style="background-color: blue;" class="text-white" >
                             @foreach($dias as $dia)
                               <td align="center" wire:click.prevent="cita('{{$dia['fecha']}}')" class="border px-4 py-2" ><b>{{ $dia['fecha']->format('d') }}</b></td> 
                            @endforeach
                            </tr>
                        </table>
                        <br>
                        {{ $fecha_cita }}
                        
                        <h1 style="color: red;">{{ $mensaje }}</h1><br>
                    </div>
                    <div>
                        @if ($errors->any())
                        <div class="text-sm text-red-600 space-y-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h6 style="color: orange;"><b>Debe mencionar alguna observación importante para el groomer. Escriba "Ninguna" en caso de no tener observaciones importantes.</b></h6><br>
                    </div>
                    <div align="center" class=" items-center gap-4">
                     <x-primary-button>{{ __('Programar Cita') }}</x-primary-button>

                        <x-action-message class="me-3" on="creado">
                            {{ __('Guardado.') }}
                        </x-action-message>
                    </div>
               </form>

             <!-- START MODAL -->


            <x-modal name="confirm-pay" :show="$errors->isNotEmpty()" focusable>
                <form class="p-6">

                    <h2 class="text-lg font-medium text-gray-900">
                       Pago de la cita
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                       Suba el comprobante para confirmar la cita
                    </p>

                   

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-primary-button class="ms-3">
                            {{ __('Confirmar') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-modal>

            </section>

            <!-- END MODAL -->

        </div>   
    </div>
</div>