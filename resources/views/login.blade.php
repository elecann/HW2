@extends('layouts.input')

@section('js')
        <script src="{{url('js/login.js')}}" defer="true"></script>
@endsection
    
@section('title', '| Login')

@section('form')
                <div id='mess'></div>
                <p class='nickname'>
                    <label>Nickname <input type='text' name='nickname' value='{{old("nickname")}}'></label>
                   
                </p>
                <p class='password'>
                    <label>Password <input type='password' name='password'></label>
                  
                    @if($error=='errato')
                    <section>Credenziali errate</section>
                    @endif
                </p>
                <p>
                    <label>&nbsp;<input type='submit' value="ACCEDI"></label>
                </p>  
                        
                <div class='login'>
                Non hai un account <a href="{{url('register')}}"> Registrati </a>
            </div>
@endsection