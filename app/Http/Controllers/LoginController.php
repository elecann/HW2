<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends BaseController
{
    public function welcome(){
        return view('welcome');
    }
    public function login_form(){
        if(session('user_id') != null){
                return redirect('home');
            }

        $error=session('error');
        Session::forget('error');
        return view('login')->with('error', $error);
    }

    public function do_login(){
        //validare dati
        if(Session::get('user_id')){
            return redirect('home');
        }
       
        //  if(strlen(request('nickname'))==0 || strlen(request('password'))==0 )
        //  {
        //      Session::put('error', 'vuoti');
        //      return redirect('login')->withInput();
        //  }
         $user=User::where('nickname', request('nickname'))->first();
        
           if(!$user || !password_verify(request('password'), $user->password)){
              Session::put('error', 'errato');
              return redirect('login')->withInput();
          }else{
            Session::put('user_id', $user->id);
            return redirect('home');
          }
        }
        
    
//    public function checkpassword($nome, $pass){
//     $user=User::where('nickname', $nome)->first();
//     //echo($user->password);
//     if(password_verify($pass, $user->password)){
//         $exist=User::where('password',$user->password)->exists();
//         return ['exists'=>$exist];
//     }
//    }



    public function register_form(){
        if(Session::get('user_id')){
                return redirect('home');
            }

        $error=Session::get('error');
        Session::forget('error');
        return view('register')->with('error', $error);
    }

    public function do_register(){
        //validare dati
        if(Session::get('user_id')){
            return redirect('home');
        }

        // if(strlen(request('nome'))==0 || strlen(request('cognome'))==0 ||strlen(request('email'))==0 || strlen(request('password'))==0 )
        // {
        //     Session::put('error', 'vuoti');
        //     return redirect('register')->withInput();
        // }

        else if(User::where('nickname', request('nickname'))->first())
        {
            
            Session::put('error', 'esiste');
            return redirect ('register')->withInput();

        }
        else if(strlen(request('nickname'))<5){

            Session::put('error','poco');
            return redirect ('register')->withInput();

        }
        if(strlen(request('password'))<8){
            Session::put('error', 'nonminimo');
            return redirect ('register')->withInput();
        }
        if(!filter_var(request('email'), FILTER_VALIDATE_EMAIL)){
            Session::put('error', 'errata');
            return redirect ('register')->withInput();
        }
        
        
        //creare utente
       $user=new User;
       $user->nome=request('nome');
       $user->cognome=request('cognome');
       $user->nickname=request('nickname');
       $user->email=request('email');
       $user->password=password_hash(request('password'), PASSWORD_BCRYPT);
       $user->save();
        
        //login
        Session::put('user_id', $user->id);
        Session::put('nickname', $user->nickname);

        //Reindirizzzzamneto home
        return redirect('home');
    }

    // public function errori($data){

    // $error=array();
    // if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/',$data['nickname'])) {
    //     $error[]='Formato nickname non valido';
    // }
    // else if(strlen($data['nickname'])<5){
    //     $error[]='Inserisci nickname di almeno 5 caratteri';
    // }
    // if(strlen($data['password'] < 8)){
    //     $error[]='Inserisci password di almeno 8 caratteri';
    // }
    // if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
    //     {
    //         $error[]='Email non valida';
    //     }

    //  return $error;
    // }

    public function checknickname($value){
        $exist=User::where('nickname', $value)->exists();
        return ['exists'=>$exist];
    }

    public function checkemail($value){
        $exist=User::where('email', $value)->exists();
        return ['exists'=>$exist];
    }


    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}
