@extends('layouts.app')

@section('content')
<?php
//dd($turnos);

?>
<h3>Reservas</h3>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Identificación de la Reserva</th>
                    <th scope="col">Día de la reserva</th>
                    <th scope="col">Hora de la reserva</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                <tr class="">
                    @php
                        $dia = date('Y-m-d', strtotime($reserva->booking->start_time));
                        $hora = date('H-i', strtotime($reserva->booking->start_time));
                    @endphp
                    <td scope="row">{{$reserva->id}}</td>
                    <td scope="row">{{$dia}}</td>
                    <td scope="row">{{$hora}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection