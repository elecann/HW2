@extends('layouts.Search')

@section('js')
<script src="{{url('js/api.js')}}" defer="true"></script>
@endsection


@section('title', '| Trova Immagini')
        

@section('body')
      @section('sistema')
        <a href="{{url('cercali')}}"> Cerca Utenti </a>
      @endsection

<form name='cerca' method='GET' id='cerca'>
    <div id='testo'> 
      <p>Vuoi cercare un'immagine? </p>
    
    <label>Digita qui<input type='text' name='ricerca' id='ricerca'></label>
   
     <label>&nbsp;<input type='submit' value="Vai" id="vai"></label>
    
</div>
</form>
     

	<form name=visualizza method="GET" id='visualizza'>  
  </form>


<section id = 'foto'> 
  
</section> 
 <div class='seleziona'></div>
    
 
 <div id='scritta'>
      <h1>Operazione eseguita con successo!</h1>
     
      <button onclick="location.href='{{url('profilo')}}'">
       visualizza al profilo
      </button>
     
      <button onclick="location.href='{{url('api')}}'">
       Ritorna alla ricerca
      </button>
    </div>
@endsection