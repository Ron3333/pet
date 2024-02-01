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
                @if($modificar_cita)
                <form wire:submit.prevent="modificarCita({{$id_pregrooming}})" class="mt-6 space-y-6">
                @else
                <form wire:submit.prevent="crearCita" class="mt-6 space-y-6">
                @endif  
                    <h4>Seleccione el perro para el grooming</h4><br>
                    <div>
                        <ul>
                            @foreach($pets as  $pet)
                                <li><input  wire:model="petId" type="radio"  value="{{$pet->id}}" id="pet_id_{{$pet->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" > 
                                 <b> {{ $pet->nombre }} </b> <img src="/foto/{{$pet->foto}}" width="50px" class="grooming" ></li>
                            @endforeach
                        </ul>
                       <x-input-error :messages="$errors->get('petId')" class="mt-1" />
                    </div>
                    <div>
                        <br>
                            <h2>Modificar</h2>
                            <label for="Observaciones" id="observacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Celos. heridas, comportamiento extraño, malestar. operaciones reciente, etc :</label>
                            <textarea wire:model="observaciones" name="observaciones" id="Observaciones" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Problemas de piel, de estomagom verrugas, heridas, etc..."></textarea> 
                            <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
                    </div>
                    <div>
                       <h2>Tipos de Grooming:</h2>
                       <div class="flex items-center mb-4">
                            <input wire:model.live="tipo_de_grooming" id="fullGrooming" type="radio" value="Full Grooming" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="fullGrooming" id="fullGrooming" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Grooming</label>
                            &nbsp;&nbsp;&nbsp;
                            <input wire:model.live="tipo_de_grooming"  id="full_grooming_plus" type="radio" value="Full Grooming Plus" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="full_grooming_plus" id="fullGroomingPlus-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Grooming Plus</label>
                             &nbsp;&nbsp;&nbsp;
                             <input wire:model.live="tipo_de_grooming" id="sanitario" type="radio" value="Baño Sanitario" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="sanitario" id="sanitario-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Baño Sanitario</label>
                             &nbsp;&nbsp;&nbsp;
                             <input wire:model.live="tipo_de_grooming" id="solo" type="radio" value="Solo Baño" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="solo" id="solo-8" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Solo Baño</label>
                             &nbsp;&nbsp;&nbsp;
                             <input wire:model.live="tipo_de_grooming" id="corte" type="radio" value="Corte de Uñas" name="tipo_de_grooming" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="corte" id="corte-7" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Corte de Uñas</label>
                        </div>
                        
                          @if(  $tipo_de_grooming == "Full Grooming" )

                          <h2 style="color: orange;">Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado y Corte de la raza o Personalizado</h2>
                          <h2 style="color: blue;"><b>Precio $50</b></h2>

                          @elseif( $tipo_de_grooming == "Full Grooming Plus" )

                          <h2 style="color: orange;">Full Grooming Plus: Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado y Corte de pelo mas elaborado. Ejemplo: Corte Asian Fusion.</h2>
                          <h2 style="color: blue;"><b>Precio $50</b></h2>

                          @elseif( $tipo_de_grooming == "Baño Sanitario" )

                          <h2 style="color: orange;">Baño sanitario: Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado, Despeje de huellas, Redondeo de Patas, Despeje de Ojos, Despeje de Zonas Nobles (Zonas Íntimas).</h2>
                          <h2 style="color: blue;"><b>Precio $40</b></h2>

                          @elseif( $tipo_de_grooming == "Solo Baño" )

                          <h2 style="color: orange;">Solo Baño : Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño y Secado.</h2>
                          <h2 style="color: blue;"><b>Precio $35</b></h2>

                          @elseif( $tipo_de_grooming == "Corte de Uñas" )

                          <h2 style="color: orange;">Corte de uñas: Corte de Uñas y Limado de Uñas.</h2>
                          <h2 style="color: blue;"><b>Precio $10</b></h2>

                          @endif
                        <x-input-error :messages="$errors->get('tipo_de_grooming')"  class="mt-2" />
                            <!-- <h3>Tipo de Grooming </h3><h3 x-text="$wire.tipo_de_grooming"></h3> -->
                        <br><br>

                    <div>
                       
                       <h2>Tiene Nudos:</h2>
                       <div class="flex items-center mb-4">
                            <input wire:model="nudos" id="si_nudo_x" type="radio" value="si" name="nudos" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="si_nudo_x" id="si_nudo_x-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SI</label>

                            &nbsp;&nbsp;&nbsp;

                            <input wire:model="nudos"  id="no_nudo_x" type="radio" value="no" name="nudos" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="no_nudo_x" id="no_nudo_x-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">NO</label>       
                       </div>
                        <x-input-error :messages="$errors->get('nudos')"  class="mt-2" />
                    </div>
                    <div align="center">
                        <h1>CALENDARIO</h1><br>
                        <div>
                            <div>
                                <button wire:click.prevent="previous()" class="bg-gray-800 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l">Prev</button>&nbsp;&nbsp;&nbsp;
                           
                                <button wire:click.prevent="next()" class="bg-gray-800 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l">Next</button>
                            </div>
                        </div><br>
                        <!-- <center><h2><b>{{-- $dias[0]['fecha']->format('F , Y') --}}</b></h2></center> -->
                        <center><h2><b><span>Fecha de Hoy </span>{{ date('Y-m-d') }}</b></h2></center><br>
                        
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
                            <tr class="text-white" >

                            @foreach($dias as $dia)
                               @if( $dia['fecha']->format('N') < 6)
                                   @if( $dia['fecha']->format('Y-m-d') < date('Y-m-d')   )
                                     <td align="center"  class="border px-4 py-2"  style="color: white; background-color:red;" ><b>{{ $dia['fecha']->format('d') }}</b></td>
                                  @else
                                       @if( $dia['status_hora'] == 0 )
                                       <td align="center" wire:click.prevent="dia('{{$dia['fecha']}}')" class="border px-4 py-2"  style="background-color: white; color: black;" ><b>{{ $dia['fecha']->format('d') }}</b></td>
                                       @elseif( $dia['status_hora'] >= 1 AND $dia['status_hora'] <= 2 )
                                       <td align="center" wire:click.prevent="dia('{{$dia['fecha']}}')" class="border px-4 py-2"  style="background-color: green; color: black;" ><b>{{ $dia['fecha']->format('d') }}</b></td>
                                       @elseif($dia['status_hora'] == 3)
                                      <td align="center"  class="border px-4 py-2" style="color: white; background-color:red;" ><b>{{ $dia['fecha']->format('d') }}</b></td>
                                      @endif
                                  @endif
                               @elseif( $dia['fecha']->format('N') == 6 OR $dia['fecha']->format('N') == 7)
                                <td align="center"  class="border px-4 py-2" style="color: white; background-color:red;" ><b>{{ $dia['fecha']->format('d') }}</b></td> 
                               @endif
                            @endforeach

                            </tr>
                        </table>
                        <br>
                         
                        @if(  $hora_cita  )
                         <h2><b>{{ date("d-M-Y", strtotime($fecha_cita2)) }}</b></h2>
                         <table>
                           <tr>
                            @if($hora_select_1)
                              <td><button wire:click.prevent=""  class="hora2"  >&nbsp;&nbsp;&nbsp; 10:00 am &nbsp;&nbsp;&nbsp;</button></td>
                            @else
                             <td><button  wire:click.prevent="fechaCita('{{$fecha_cita2}}' , '10:00 am' )" class="hora"  >&nbsp;&nbsp;&nbsp; 10:00 am &nbsp;&nbsp;&nbsp;</button></td>
                            @endif

                             @if($hora_select_2)
                               <td><button wire:click.prevent=""  class="hora2" >&nbsp;&nbsp;&nbsp; 2:00 pm &nbsp;&nbsp;&nbsp;</button></td>
                             @else
                               <td><button wire:click.prevent="fechaCita('{{$fecha_cita2}}', '2:00 pm' )"  class="hora" >&nbsp;&nbsp;&nbsp; 2:00 pm &nbsp;&nbsp;&nbsp;</button></td>
                             @endif

                             @if($hora_select_3)
                             <td><button wire:click.prevent="" class="hora2" >&nbsp;&nbsp;&nbsp; 4:00 pm &nbsp;&nbsp;&nbsp;</button></td>
                             @else
                              <td><button wire:click.prevent="fechaCita( '{{$fecha_cita2}}', '4:00 pm' )" class="hora" >&nbsp;&nbsp;&nbsp; 4:00 pm &nbsp;&nbsp;&nbsp;</button></td>
                             @endif               
                         </tr>
                       </table>
                       @endif 
                       <br>
                       @if(!empty($cita))
                       <h1 style="color: red;"><b><u>Día de la Cita : {{ $cita }}</u></b></h1>
                       @endif


                        <input wire:model="fecha_cita" type="hidden" id="fechatCita-X" >
                        
                        <h1 style="color: red; font-weight: 700;">{{ $mensaje }}</h1><br>
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

                     @if($modificar_cita)
                        <x-primary-button>{{ __('Modificar Cita') }}</x-primary-button>
                     @else
                       <x-primary-button>{{ __('Programar Cita') }}</x-primary-button>
                     @endif

                    <button  wire:click.prevent="facturas()" class="btn btn-blue" style="border-style: solid; border-color: black; border-width: medium; " >FACTURA</button>

                        <x-action-message class="me-3" on="creado">
                            {{ __('Guardado.') }}
                        </x-action-message>
                    </div>

               </form>

             <!-- START MODAL -->


            <x-modal name="confirm-pay" :show="$errors->isNotEmpty()" focusable>
                <form wire:submit="confirmaPay"  class="p-6">
                    <div align="center">
                      <h2 class="text-lg font-medium text-gray-900">
                         Por favor confirma la información
                      </h2>

                      <h2 class="mt-1 text-sm text-gray-600">
                        <b> Cita: {{$fecha_grooming}}</b>
                      </h2>

                      @if($factura)

                      <p><img width="50px" src="/foto/{{$foto_groming}}"></p>
                      <!-- <h6>{{$id_perro}}</h6> -->
                      <h6>{{$nombre_perro_grooming}}</h6>
                      <h5><b>{{$tipo_groming_grooming}}</b></h5>
                      <h6>Total Depósito a pagar</h6>
                      <h1 style="color: green"><b>${{ number_format($precio_grooming, 2, ',', ' ')}}</b></h1>
                    </div>
                      <center><button  class="btn btn-green" wire:click.prevent="modificarCitaPregrooming({{$id_pregrooming_one}})" style="border-style: solid; border-color: black; border-width: medium; color: white; background-color: green ;  " >&nbsp;&nbsp;&nbsp; Modificar &nbsp;&nbsp;&nbsp;</button></center>
                    @else

                       <table>
                       @foreach($Pregroomings as  $Pregrooming)
                       <tr>
                            <td><img width="50px" src="/foto/{{$Pregrooming->foto}}"></td>
                            <td>&nbsp;&nbsp;&nbsp;{{$Pregrooming->perro}}&nbsp;&nbsp;&nbsp;</td>
                            <td><b>Cita:{{$Pregrooming->fecha}}&nbsp;&nbsp;&nbsp;</b></td>  
                            <td>{{$Pregrooming->tipo_groming}}&nbsp;&nbsp;&nbsp;</td>
                            <td><button wire:click.prevent="eliminar({{$Pregrooming->id}})" class="btn " style="background-color: red; color: white; border-style: solid; border-color: black; border-width: medium; " >&nbsp;&nbsp;&nbsp;Eliminar&nbsp;&nbsp;&nbsp;</button></td>
                            <td><button wire:click.prevent="modificarCitaPregrooming({{$Pregrooming->id}})" class="btn " style="background-color: green; color: white; border-style: solid; border-color: black; border-width: medium; " >&nbsp;&nbsp;&nbsp;Modificar&nbsp;&nbsp;&nbsp;</button></td>
                       </tr>
                       @endforeach
                       </table>

                       <h1 style="color: green"><b>${{ number_format($precio_total_grooming, 2, ',', ' ')}}</b></h1>
                     
                    @endif

                    @if($cant_perros > 1 )
                    <div align="center">
                        <br>
                       <h2>¿ Quiere agregar otra cita para otro perrito ?</h2>
                         <table>
                           <tr style="background-color: green ;" class="text-white" >

                            <td><button  class="btn btn-green" wire:click.prevent="cerrar()" style="border-style: solid; border-color: black; border-width: medium; " >&nbsp;&nbsp;&nbsp; SI &nbsp;&nbsp;&nbsp;</button></td>
                          
                            <td><button wire:click.prevent="cerrar()" class="btn btn-green" style="border-style: solid; border-color: black; border-width: medium;">&nbsp;&nbsp;&nbsp; NO &nbsp;&nbsp;&nbsp;</button></td>
                               
                         </tr>
                       </table>
                      </div>
                    @endif

                    <div align="center">
                      <table>
                        <tr>
                          <td><span style="color: red;"><a href="#"><img  width="80px" src="/web/cashapp.png"></a></span> </td>
                          <td><span style="color: blue;"><a href="#"><img  width="120px" src="/web/venmo.png"></a></a></span> </td>
                          <td><span style="color: green;"><a href="#"><img  width="80px" src="/web/zelle.jpeg"></a></a></span></td>
                        </tr>
                      </table>
                    </div>
                    <div class="mt-6">
                         <label for="foto-pago" id="foto-pago-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto comprobante de pago:</label><br>
                          <input wire:model="foto_pago" type="file" id="foto-pago" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                          <x-input-error :messages="$errors->get('foto_pago')" class="mt-2" />
                            <br>

                            <center><div wire:loading wire:target="foto_pago">Cargando...</div></center>
                        @if ($foto_pago) 
                         <center><img src="{{ $foto_pago->temporaryUrl() }}"></center>
                         @endif
                    </div>

                    <div class="mt-6 flex justify-end">
                        <!-- <x-secondary-button x-on:click.prevent="$dispatch('close')">
                            {{ __('Cerrar') }}
                        </x-secondary-button> -->

                        <button wire:click.prevent="cerrar()" class="btn " style="background-color: gray; color: white; border-style: solid; border-color: black; border-width: medium; " >&nbsp;&nbsp;&nbsp;Cerrar&nbsp;&nbsp;&nbsp;</button>

                        <x-primary-button class="ms-3">
                            {{ __('Confirmar Cita') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-modal>

            </section>

            <!-- END MODAL -->

        </div>   
    </div>
</div>