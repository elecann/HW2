@extends('layouts.app')

@section('css')
<link rel='stylesheet' href="{{url ('css/inside.css')}}">
@endsection


@section('header')
<nav>
                <div class="menu">
                @yield('sistema')
                <a href="{{url('home')}}"> Home </a>
                 <a href="{{url('profilo')}}"> Profilo </a>
                 <a href="{{url('logout')}}"> Logout </a>
                
            </div>
</nav> 
@endsection