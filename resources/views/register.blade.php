@extends('layouts.input')

@section('js')
    <script src="{{url('js/registrazione.js')}}" defer="true"></script>
@endsection

@section('title', '| Iscrizione')



@section('error')
    @if($error=='vuoti')
    <section> Compila tutti i campi</section>
    @endif
@endsection

@section('form')
    <div id='mess'></div>
        <p class='nome'>
            <label> Nome<input type="text" name="nome" value='{{old("nome")}}'></label>
            <span>Formato non valido</span>
        </p>
        <p class='cognome'>
            <label> Cognome<input type="text" name="cognome" value='{{old("cognome")}}'></label>  
            <span>Formato non valido</span>
        </p>
        <p class='nickname'>
            <label> Nickname<input type="text" name="nickname" value='{{old("nickname")}}'></label>  
            <span>Formato non valido</span>
            @if($error=='esiste')
            <section>Nome utente non disponibile</section>
            @elseif($error=='errato')
                    <section class='nickname'>Nickname formato errato</section>
                    @elseif($error=='poco')
                    <section>Il nickname deve essere di almeno 5 caratteri</section>
                    @endif                
                </p>
                <p class='email'>
                    <label> Email<input type="text" name="email" value='{{old("email")}}'></label>
                    <span>Formato non valido</span>
                    @if($error=='errata')
                    <section class='email'>Email formato errato</section>
                    @endif
                </p>
                <p class='password'>
                    <label> Password<input type="password" name="password" value='{{old("password")}}'></label>
                    <span>La password di 8 caratteri deve contenere:<br>
                        almeno un numero<br>
                        almeno una lettera minuscola<br>
                        -almeno una lettera maiuscole<br>
                        -almeno un carattere speciale tr($-/:-?{-~!"^_`\[\]).
                        </span>
                @if($error=='nonminimo')
                <section>LA password deve contenere almeno 8 caratteri</section>
                @endif 
                
                </p>

                <p> <label>&nbsp;<input type="submit" name="invia" id="mandalo" value="Next step"></label></p>

            
            <div class='login'>
                Se hai già un account effettua il <a href="{{url('login')}}"> Login </a>
            </div>
@endsection
