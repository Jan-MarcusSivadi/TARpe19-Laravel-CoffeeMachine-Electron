@extends('coffeeMachine.layout')

@section('content')
    <h1 class="d-flex justify-content-center page-title">Missugust jooki soovite lisada?</h1>
    <hr class="hr-1">
    <x-alert />
    <form class="" method="post" action="{{route('coffeeMachine.store')}}">
        @csrf
        <!-- Joogi nimi -->
        <div class="d-flex justify-content-center">
            <input type="text" name="jooginimi" id="item-title" placeholder="Joogi nimi">
        </div>
        <!-- Topse pakis -->
        <div class="d-flex justify-content-center">
            <input type="number" name="topsepakis" id="item-title" value="50" placeholder="Topse pakis">
        </div>
        <hr class="hr-1">
        <!-- Lisamise nupp -->
        <div class="d-flex justify-content-center">
            <button type="submit" value="Create" class="btn btn-primary" id="Default-btn">Lisa Jook</button>
        </div>

    </form>
    <!-- Tagasi nupp -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" id="Back-btn" href="{{route('coffeeMachine.admin')}}" role="button">Mine tagasi</a>
    </div>
@endsection