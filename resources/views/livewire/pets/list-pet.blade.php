<div>
	<h1 class="font-semibold text-xl text-gray-800 leading-tight"><b>Mascotas</b></h1><br>
	<table>
		<tr>
      @foreach($pets as $pet)
      		<td>
            <p>&nbsp;&nbsp;&nbsp<img src="/foto/{{$pet->foto}}" width="50px" >&nbsp;&nbsp;&nbsp</p>
            <p>&nbsp;&nbsp;&nbsp{{ $pet->nombre }}&nbsp;&nbsp;&nbsp</p>
            </td>
       @endforeach
        </tr>
     </table>

      <button wire:click="programarCita" class="btn" style="background-color: gray; color: white; border-style: solid; border-color: black; border-width: medium; " >&nbsp;&nbsp;&nbsp;Programar Cita&nbsp;&nbsp;&nbsp;</button>

</div>
