@extends('layouts.app')

@section('css')
<link rel='stylesheet' href="{{url('css/profilo.css')}}"> 
@endsection

@section('js')
<script src="{{url('js/profilo.js')}}" defer="true"></script>
@endsection

@section('title', '| Profilo')

@section('header')
<div id='intestazione'>
                          
                          <div class="menu">
                      
                           <a href="{{url('api')}}"> Cerca Immagini </a>
                           <a href="{{url('home')}}"> Home  </a>
                           <a href="{{url('logout')}}"> Logout </a>
                          
                      </div>
                  </div>
@endsection

@section('body')
<section class=foto>
    <div id='foto'></div>
    <h1>{{$nickname}}</h1>
</section>
            
            
            <form  method='post' class='link' action="{{route('impostala')}}">
            @csrf 
            <label>Inserisci l'URL per la tua immaggine profilo:<input type='text' name='image' class='url'></label>
            <label><input type='submit' class='url' value='Imposta'></label>
            
            </form>
        
           

                <section id='contenuti'>
                
            </section>
            <input type="submit" value="Visualizza mi piace" id="like">
            <section class=prefe></section>

@endsection