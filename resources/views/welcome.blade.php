@extends('layouts.app')

@section('css')
        <link rel='stylesheet' href="{{ url('css/hmw.css')}}">
@endsection

@section('title', '| Welcome')

@section('header')
<div id='welcome'>
    <h2> Becky</h2>
    <div> Condividi con gli altri utenti le foto ad alta qualità </div>
</div>
@endsection

@section('body')
    <div id='wel'> 
        <a href="{{url('register')}}"> Registrati al sito </a>
        <a href="{{url('login')}}"> Accedi al sito </a>
    </div>
@endsection
