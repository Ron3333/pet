<div>
	<h1 class="font-semibold text-xl text-gray-800 leading-tight"><b>Citas</b></h1><br>
	<table>
    @foreach ($citas as $cita)
        <tr wire:key="{{ $cita->id }}"> 
           <td><img src="/foto/{{$cita->pet->foto}}" width="50px" ></td>
           <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cita->pet->nombre}} &nbsp;&nbsp;&nbsp;</td>
           <td> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;{{$cita->fecha}} &nbsp;&nbsp;&nbsp;</td>
           <td>{{$cita->cancelado}}</td>
        </tr>
    @endforeach
    </table>
</div>
