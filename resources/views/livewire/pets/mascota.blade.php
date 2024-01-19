<div class="py-12">
    <div class="max-w-5xl  mx-auto sm:px-6 lg:px-8 space-y-6">
    <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"> -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Crear Mascota') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Crea tu mascota.') }}
                    </p>
                </header>

                <form wire:submit="createPet" class="mt-6 space-y-6">
                    <div>
                        <x-input-label for="nombre" :value="__('Nombre:')" />
                        <x-text-input wire:model="nombre" id="nombre" name="nombre" value="{{$nombre}}" type="text" class="mt-1 block w-full" autocomplete="nombre" required />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="apellido" :value="__('Apellido:')" />
                        <x-text-input wire:model="apellido" id="apellido" name="apellido" type="text" class="mt-1 block w-full" autocomplete="apellido" required />
                        <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="raza" :value="__('Raza:')" />
                        <select wire:model="raza" class="mt-1 block w-full" >
                            <option selected >Seleciona Raza</option>
                            <option value="Basenji">Basenji</option>
                            <option value="Basset Hound">Basset Hound</option>
                            <option value="Beagle">Beagle</option>
                            <option value="Bichón Maltes">Bichón Maltes</option>
                            <option value="Boston Terrier">Boston Terrier</option>
                            <option value="Bulldog Francés">Bulldog Francés</option>
                            <option value="Bulldog Inglés">Bulldog Inglés</option>
                            <option value="Cairn Terrier">Cairn Terrier</option>
                            <option value="Cavaller King Charies Spaniel">Cavaller King Charies Spaniel</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Cocker Spaniel Americano">Cocker Spaniel Americano</option>
                            <option value="Cocker Spaniel Inglés">Cocker Spaniel Inglés</option>
                            <option value="Crestado Chino">Crestado Chino</option>
                            <option value="Gaigo Italiano">Gaigo Italiano</option>
                            <option value="Jack Russell Terrier">Jack Russell Terrier</option>
                            <option value="Lhasa Apso">Lhasa Apso</option>
                            <option value="Maltes">Maltes</option>
                            <option value="Mini Doodle">Mini Doodle</option>
                            <option value="Papillon">Papillon</option>
                            <option value="Pelo Corto">Pelo Corto</option>
                            <option value="Pequinés">Pequinés</option>
                            <option value="Pinscher Miniatura">Pinscher Miniatura</option>
                            <option value="Pomerania">Pomerania</option>
                            <option value="Poodle">Poodle</option>
                            <option value="Pug">Pug</option>
                            <option value="Ratón de Praga">Ratón de Praga</option>
                            <option value="Salchicha (Dachshund)">Salchicha (Dachshund)</option>
                            <option value="Schnauzer Mediano">Schnauzer Mediano</option>
                            <option value="Schnauzer Miniatura">Schnauzer Miniatura</option>
                            <option value="Scottish Terrier">Scottish Terrier</option>
                            <option value="Shiba inu">Shiba inu</option>
                            <option value="Snih Tzu">Snih Tzu</option>
                            <option value="West Highiand White Terrier">West Highiand White Terrier</option>
                            <option value="Whipper">Whipper</option>
                            <option value="Yorkshire Terrier">Yorkshire Terrier</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <x-input-error :messages="$errors->get('raza')" class="mt-2" />
                    </div>
                    <div>
                       <x-input-label for="edad" :value="__('Edad:')" />
                       <input type="number" wire:model="edad" id="edad" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0"  max="18" min="0" required>
                        <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                    </div>

                     <div>
                       <x-input-label for="meses" :value="__('Meses:')" />
                       <input type="number" wire:model="meses" id="meses" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" max="11" min="0" >
                        <x-input-error :messages="$errors->get('meses')"  class="mt-2" />
                    </div>
                    <div>
                       <x-input-label for="sexo" :value="__('Genero:')" />
                       <div class="flex items-center mb-4">
                            <input wire:model="sexo" id="sexo-hembra" type="radio" value="hembra" name="sexo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hembra" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hembra</label>
                            &nbsp;&nbsp;&nbsp;
                            <input wire:model="sexo"  id="sexo-macho" type="radio" value="macho" name="sexo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="macho" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Macho</label>
                        </div>
                        <x-input-error :messages="$errors->get('sexo')"  class="mt-2" />
                    </div>
                     <div>
                       <x-input-label for="size" :value="__('Tamaño:')" />
                       <div class="flex items-center mb-4">
                            <input wire:model="size" id="size-pequ" type="radio" value="pequeño" name="size" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hembra" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pequeño</label>
                            &nbsp;&nbsp;&nbsp;
                            <input wire:model="size"  id="size-grande" type="radio" value="mediano" name="size" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="size" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mediano</label>
                        </div>
                        <x-input-error :messages="$errors->get('size')"  class="mt-2" />
                    </div>
                      <div>
                       <x-input-label for="peso" :value="__('Peso Lb:')" />
                       <input type="number" wire:model="peso" id="peso" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" max="50" min="0" >
                        <x-input-error :messages="$errors->get('peso')"  class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="actitud" :value="__('Energia:')" />
                        <select wire:model="actitud" class="mt-1 block w-full" >
                            <option selected >¿Cómo considera a tu mascota?</option>
                            <option value="Energía alta">Energía alta</option>
                            <option value="Energía media">Energía media</option>
                            <option value="Energía baja">Energía baja</option>
                            <option value="Nerviosa">Nerviosa</option>
                            <option value="Nerviosa e insegura">Nerviosa e insegura</option>
                            <option value="Ansiosa">Ansiosa</option>
                            <option value="Agresiva">Agresiva</option>
                        </select>
                        <x-input-error :messages="$errors->get('actitud')" class="mt-2" />
                    </div>
                    <div>
                        
                        <x-input-label for="socializa" :value="__('Tu perro socializa con:')" />
                         @if ($block_social) 

                        <div class="flex items-center ">
                            <input wire:model="socializa.0"  name="socializa.0" id="gente-checkbox" type="checkbox" value="personas" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $isDisabled }} >
                            <label for="gente-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Personas1</label>
                        </div>
                        <div class="flex items-center  ">
                            <input wire:model="socializa.1"  name="socializa.1"  id="dog-checkbox" type="checkbox" value="perros" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $isDisabled }}  >
                            <label for="dog-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Perros</label>
                        </div>
                        <div class="flex items-center  ">
                            <input wire:model="socializa.2"  name="socializa.2"  id="children-checkbox" type="checkbox" value="niños" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"{{ $isDisabled }}  >
                            <label for="children-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Niños</label>
                        </div>

                        @else

                        <div class="flex items-center ">
                            <input wire:model="socializa.0"  name="socializa.0" id="gente-checkbox" type="checkbox" value="personas" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $isDisabled }} >
                            <label for="gente-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Personas</label>
                        </div>
                        <div class="flex items-center  ">
                            <input wire:model="socializa.1"  name="socializa.1"  id="dog-checkbox" type="checkbox" value="perros" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ $isDisabled }}  >
                            <label for="dog-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Perros</label>
                        </div>
                        <div class="flex items-center  ">
                            <input wire:model="socializa.2"  name="socializa.2"  id="children-checkbox" type="checkbox" value="niños" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"{{ $isDisabled }}  >
                            <label for="children-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Niños</label>
                        </div>

                        @endif


                        <div class="flex items-center  
                        ">
                            <input wire:model="socializa.3"  wire:click="blocksocializa()" name="No socializa"   id="no-social-checkbox" type="checkbox" value="no socializa" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                            <label for="no-social-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No socializa</label>
                        </div>  
                        <div>Habilitar = {{ $isDisabled }} </div>
                        <div>Block = {{ $block_social }} </div>
                         <x-input-error :messages="$errors->get('socializa')" class="mt-2" />
                    </div>
                     <div>
                        <x-input-label for="muerde" :value="__('Muerde:')" />
                        <select wire:model="muerde" class="mt-1 block w-full" >
                            <option selected >¿Alguna vez ha mordido a alguien?</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>   
                            <option value="Lo intenta pero no muerde">Lo intenta pero nunca lo ha hecho</option>   
                        </select>
                        <x-input-error :messages="$errors->get('muerde')" class="mt-2" />
                    </div>
                    <div>
                        <label for="Observaciones" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones importantes:</label>
                        <textarea wire:model="info_adicional" id="Observaciones" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Problemas de piel, de estomagom verrugas, heridas, etc..."></textarea> 
                        <x-input-error :messages="$errors->get('info_adicional')" class="mt-2" />
                    </div>
                    <div>
                          <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto para el perfil de tu perro:</label><br>
                          <input wire:model="foto" type="file" id="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                          <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                            <br>

                            <center><div wire:loading wire:target="foto">Cargando...</div></center>
                        @if ($foto) 
                         <center><img src="{{ $foto->temporaryUrl() }}"></center>
                         @endif
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
                    </div>

                    <div class="flex items-center gap-4">
                     <x-primary-button>{{ __('Guardar') }}</x-primary-button>

                        <x-action-message class="me-3" on="creado">
                            {{ __('Guardado.') }}
                        </x-action-message>
                    </div>

                </form>
            </section>
        </div>   
    </div>
</div>



