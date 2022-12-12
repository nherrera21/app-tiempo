@extends('layouts.website')
<div class="mohammad-a">
    <div class="bitmap"></div>
    <div class="texto-b">
        ¡Que la lluvia no te pare!
    </div>
    <div class="row area">
        <div class="area-a col-md-8 row">
            <div class="col-md-6 text-center mt-5">
                <div>
                    <label class="label-a">Código postal:</label>
                    <label class="label-aa">{{ $result->zipcode }}</label>
                </div>
                <div>
                    <label class="label-a">Ciudad:</label>
                    <label class="label-aa">{{ $result->city }}</label>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="icon-btn-b"></div>
                <a href="/">Buscar otra zona</a>
            </div>
            <div class="row">
                <div class="col-md-3 area-aa">
                    <label class="label-temp-a">Ahora</label>
                    <label class="lable-temp">{{ $result->temperature }}°C</label>
                    <label class="label-temp-a">Humedad: {{ $result->humidity }}%</label>
                </div>
                <div class="col-md-9 area-aa">
                    <label class="label-temp-a">Próximas 5 días</label>
                    <div style="display: flex; flex-direction:row; justify-content:space-between">
                        @foreach($result->nextDays as $day)
                        <div>
                            <label style="font-size:30px; color:white; margin-left: 30px">{{ $day->date }}</label>
                            <label style="font-size:30px; color:white; margin-left: 30px">{{ $day->temperature }}°C</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="area-b col-md-4 row">
            <div class="col-md-12 text-center">
                <label class="label-temp-a col-md-12">Top 5 de las zonas más frías según tus búsquedas</label>
            </div>
            <div class="mt-5">
                @foreach($result->top as $top)
                <div style="display: flex; flex-direction:row; justify-content:space-between; margin-top:10px">
                    <label style="width: 20%;font-size:30px; color:white; margin-left: 20px">{{ $top->index }}.-</label>
                    <label style="width: 20%;font-size:30px; color:white; margin-left: 20px">{{ $top->temperature }}°C</label>
                    <div style="display: flex; flex-direction:column; width:60%">
                        <div style="display: flex; flex-direction:row; width:100%">
                            <label class="label-a" style="font-size: 10px;">Código postal:</label>
                            <label class="label-aa" style="font-size: 15px;">{{ $top->zipcode }}</label>
                        </div>
                        <div style="display: flex; flex-direction:row; width:100%">
                            <label class="label-a" style="font-size: 10px;">Ciudad:</label>
                            <label class="label-aa" style="font-size: 15px;">{{ $top->city }}</label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>