@extends('coffeeMachine.layout')

@section('content')
<div>
    <h1>Kohviautomaat Haldusleht</h1>
    <hr class="hr-1">
    <x-alert />
    <!-- Lisamise nupp, mis viib kasutaja joogi lisamise lehele -->
    <div class="d-flex justify-content-center buttons">
        <a class="btn btn-primary" href="{{route('coffeeMachine.create')}}">Lisa uus Jook</a>
    </div>

    <!-- Loetelu andmebaasi andmetest -->
    <ul class="list-group">
        
        @foreach($joogid as $jook)

            <h3>{{$jook->jooginimi}}</h3>

            <li class="list-group-item d-flex justify-content-between align-items-center" id="vertical-align-item">

                <a class="padding-part">Topse Pakis: {{$jook->topsepakis}}</a>
                <a class="padding-part">Topse Juua: {{$jook->topsejuua}}</a>
                <div class="d-flex justify-content-end">
                    @if( ($jook->topsejuua) <= ($jook->topsepakis) )
                        <a class="btn btn-primary padding-part margin-part" href="{{route('coffeeMachine.increment', $jook->id)}}">Täida {{$jook->topsepakis}} topsi</a>
                        <a class="btn btn-danger"
                        onclick="event.preventDefault();
                                    if(confirm('Kas olete kindel et soovite \'{{$jook->jooginimi}}\' kustutada?'))
                                    {
                                        document.getElementById('form-delete-{{$jook->id}}')
                                        .submit();
                                    }"
                            href="#">Eemalda</a>
                            <form style="display: none" id="{{'form-delete-'.$jook->id}}" method="POST" action="{{route('coffeeMachine.delete',$jook->id)}}">
                                @csrf
                                @method('delete')
                            </form>
                    @else
                        <a class="btn btn-success padding-part2" href="#">Korras</a>
                    @endif
                </div>
                
            </li>
            
            <div class="machine-item"></div>

        @endforeach

    </ul>

</div>
@endsection