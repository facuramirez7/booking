@extends('layouts.app')

@section('content')
<?php
//dd($turnos);

?>
<h3>Reserva para el día {{$fecha}}</h3>
<div class="card-body">
    <form id="reserved" method="POST" action="{{ route('store') }}">
        @csrf

        <div class="row mb-3">
            <label for="horario" class="col-md-4 col-form-label text-md-end">{{ __('Horario') }}</label>

            <div class="col-md-6">
                <select id="booking_id" name="booking_id" value="{{ old('horario') }}" required>
                    <option selected disabled value="">Elija un turno</option>
                    @foreach ($turnos as $turno)
                        @php
                            $hora_i = date('H-i', strtotime($turno->start_time));
                            $hora_f = date('H-i', strtotime($turno->finish_time));
                        @endphp
                        <option value="{{$turno->id}}">{{$hora_i}} a {{$hora_f}} ({{$turno->cupo}} disponible)</option>
                    @endforeach
                </select>

            </div>
        </div>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Guardar reserva') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection