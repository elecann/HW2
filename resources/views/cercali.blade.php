@extends('layouts.Search')

@section('js')
  <script src="{{url('js/cercali.js')}}" defer="true"></script>
@endsection


@section('title', '| CercaUtente')



@section('body')

@section('sistema')
<a href="{{url('api')}}"> Cerca Immagini </a>
@endsection

<form name='cercali' method='get' class='cerca'>
    <div id='testo'> 
    <label>Cerca l'utente: <input type='text' name='cerca' class='cerca'></label>
   
     <label>&nbsp;<input type='submit' value="Cerca" class='cerca'></label>
    
</div>
</form>
     
      
     

<div id='nome'>
</div>



<section id = 'foto'> 
  
</section> 
 
@endsection