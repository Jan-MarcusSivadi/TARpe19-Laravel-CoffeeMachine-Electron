@extends('coffeeMachine.layout')

@section('content')

@php
    $amount = 0;
@endphp
@foreach($joogid as $jook)

    @if($jook->topsejuua > 0)
        @php
            $amount ++;
        @endphp
    @endif

@endforeach

<div>
    <h1>Kohviautomaat</h1>
    @if($amount != 0)
        @if($amount > 1) 
            <h4>Saadaval on {{$amount}} jooki</h4>
        @elseif($amount < 2)
            <h4>Saadaval on {{$amount}} jook</h4>
        @endif
    @endif
    <hr class="hr-1">

    @if($count > 0)
        <!-- Loetelu andmebaasi andmetest -->

        <ul class="list-group">

            @foreach($joogid as $jook)

                @if($jook->topsejuua > 0)
                    <h3>{{$jook->jooginimi}}</h3>

                    <li class="list-group-item d-flex justify-content-between align-items-center" id="vertical-align-item">
                        <a class="padding-part">Topse Juua: {{$jook->topsejuua}}</a>
                        <a class="btn btn-primary padding-part" href="{{route('coffeeMachine.decrement', $jook->id)}}">Joo ära 1 tops</a>
                    </li>
                    <div class="machine-item"></div>
                @endif

            @endforeach
                
            @if($amount == 0)
                <div class="d-flex justify-content-center">
                    <p>Kõik Joogid on otsas, tulge hiljem tagasi :)</p>
                </div> 
            @endif

        </ul>

    @else
        <div class="d-flex justify-content-center">
            <p>Jooke pole hetkel saadaval, tulge hiljem tagasi :)</p>
        </div> 
    @endif
</div>
@endsection