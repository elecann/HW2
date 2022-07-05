@extends('layouts.app')

@section('css')
<link rel='stylesheet' href="{{ url('css/home.css')}}">
@endsection



@section('title', '| Homepage')



@section('body')
<div id = "overlay"> </div>
        <main>
                <div id="utente">
                Ciao {{$nickname}}
            </div>

            
                <div class="opzioni"><a href="{{url('api')}}"> Cerca Immagini </a></div>
                <div class="opzioni"><a href="{{url('profilo')}}"> Profilo </a></div>
                <div class="opzioni"><a href="{{url('cercali')}}"> Cerca Utente </a></div>
                <div class="opzioni"><a href="{{url('logout')}}"> Logout </a></div>
     </main>

@endsection
