<div>
	<h1 class="font-semibold text-xl text-gray-800 leading-tight"><b>Mascotas</b></h1><br>
      @foreach($pets as $pet)
           
            <p><img src="/foto/{{$pet->foto}}" width="50px" > <span><td>{{ $pet->nombre }}</td></span> <span>{{ $pet->apellido }}</span></p>
       @endforeach
</div>
