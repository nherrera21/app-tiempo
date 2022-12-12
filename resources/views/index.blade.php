@extends('layouts.website')
<div class="mohammad-a">
    <div class="bitmap"></div>
    <div class="texto-a">
        Entérate del tiempo en la zona exacta que te interesa buscando por código postal.
    </div>
    <form name="zipcode-form" id="zipcode-form" method="post" action="{{url('tiempo')}}">
        @csrf
        <div class="input-a">
            <input class="input-b" placeholder="Introduce el código postal" name="zipcode" id="zipcode" />
        </div>
        <button class="btn-b btn" type="submit">
            <span class="text-btn-b">Buscar</span>
            <div class="icon-btn-b">
                <div>
        </button>
    </form>
    @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
    @endif
    <div class="footer-a">
        ¡Que la lluvia no te pare!
    </div>
</div>