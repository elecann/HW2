<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfiloController extends BaseController
{
    public function cercali(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        return view('cercali');
    }
    


    public function porfavor($nickname){
        
        $user=User::select('nickname','image')->where('nickname', $nickname)->get();
        return response()->json($user);
    }
    

    public function cercapost($nome){
        
        $posts=Post::select('foto')->where('nickname', $nome)->get();
        return response()->json($posts);
        
    }

}
