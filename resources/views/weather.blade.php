@extends('layouts.app')

@section('content')

<div class="weather col-md-5 col-md-offset-4">
            <h3 class="text-primary pull-left"><img src="{{ $weather->day_part[0]->image }}"/>
                 {{ $weather->title  }} / {{ $weather->country }}
                <span class="text-muted">({{ \Carbon\Carbon::parse($weather->day_part[0]->observation) }})</span>
            </h3>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <p>восход: {{ $weather->sun_rise }} / заход: {{ $weather->sunset }}</p>
            <p>{{ $weather->day_part[0]->weather_type  }} / давление: {{ $weather->day_part[0]->pressure }} мм.рт.ст.</p>
            <p>ветер: {{ $weather->day_part[0]->wind_direction }}, {{ $weather->day_part[0]->wind_speed }} м/с
               / температура: {{ $weather->day_part[0]->temperature }}&deg;C
            </p>
        </div>
</div>
@endsection