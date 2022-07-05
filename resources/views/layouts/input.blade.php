@extends('layouts.app')

@section('css')
<link rel='stylesheet' href="{{url('css/hmw.css')}}"> 
@endsection



@section('body')
<div id = "overlay"> </div>
    @yield('error')

        <main>
            <form  name='form' method='post'>
                @csrf
               @yield('form')
            </form>
        </main>
@endsection