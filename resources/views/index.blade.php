@extends('layouts.website')
<div class="row mt-5">
    <form name="zipcode-form" id="zipcode-form" method="post" action="{{url('tiempo')}}">
        @csrf
        <div class="row col-md-12 my-5">
            <div class="col-md-4"></div>
            <div class="col-md-3">
                <label class="visually-hidden" for="autoSizingInputGroup">CODIGO POSTAL:</label>
                <div class="input-group">
                    <div class="input-group-text">CODIGO POSTAL:</div>
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="" name="zipcode" id="zipcode" value="@isset($result){{ $result->zipcode }}@endisset">
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit">CONSULTAR</button>
            </div>
            @if(session('error'))
            <div class="alert alert-danger col-md-12 text-center">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </form>
    <div class="row col-md-12">
        @isset($result)
            <div class="col-md-12 text-center">
                <div class="fw-bold">{{ $result->city }}, {{ $result->country }}</div>
                <div class="my-3">
                    <div class="fw-bold">HOY</div>
                    <label>{{ $result->max }}°C | {{ $result->min }}°C</label>
                    <h2 class="my-2 fw-bold">{{ $result->temperature }}°C</h2>
                    <label>Humedad: {{ $result->humidity }}%</label>
                </div>
            </div>
            <div class="col-md-1 mt-2"></div>
            @foreach($result->nextDays as $day)
            <div class="col-md-2 text-center mt-2">
                <div class="fw-bold">{{ $day->date }}</div>
                <div class="my-3">
                    <h2 class="my-2 fw-bold">{{ $day->temperature }}°C</h2>
                    <label>Humedad: {{ $day->humidity }}%</label>
                </div>
            </div>
            @endforeach
            <div class="col-md-1 mt-2"></div>
            <div class="col-md-12 mt-2 border-top mx-2 fw-bold">CIUDADES CON LA TEMPERATURA MÁS BAJA</div>
            <div class="col-md-1 mt-2"></div>
            @foreach($result->top as $top)
            <div class="col-md-2 text-center mt-2">
                <div class="fw-bold">{{ $top->city }} - {{ $top->date }}</div>
                <div class="my-3">
                    <h2 class="my-2 fw-bold">{{ $top->temperature }}°C</h2>
                    <label>Humedad: {{ $top->humidity }}%</label>
                </div>
            </div>
            @endforeach
            <div class="col-md-1 mt-2"></div>
        @endisset
    </div>
</div>