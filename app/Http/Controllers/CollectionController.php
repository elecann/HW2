<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class CollectionController extends BaseController
{
    public function home(){
        if(!Session::get('user_id')){
                return redirect('login');
            }
        $user=User::find(Session::get('user_id'));
        return view('home')->with('nickname', $user->nickname);
    }

  

    public function profilo()
    {
            if(!Session::get('user_id')){
             return redirect('login');
         }
        $user=User::find(Session::get('user_id'));
        return view('profilo')->with('nickname', $user->nickname);
    }

    public function contenuti()
    {
            if(!Session::get('user_id')){
             return [];
         }

        $foto=User::find(Session::get('user_id'));
        echo $foto->posts;
        
        
    } 

    public function prefe()
    {
            if(!Session::get('user_id')){
             return [];
         }

        $ele=User::find(Session::get('user_id'));
        echo $ele->favs;
        
        
    } 
  
    
    public function impostala(){
        $request=request();
        $session = session('user_id');
        $user=User::find($session);
        
        User::where('id', $session)->update(['image' => $request['image']]);

        return view('profilo')->with('nickname', $user->nickname);
        
    }
    
    public function rimuovi($id){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $session = session('user_id');
        $user=User::find($session);
        Post::where('user_id', $session)->where('id', $id)->delete();
        
        return view('profilo')->with('nickname', $user->nickname);
    }

    public function porfavor(){
        $session_id = session("user_id");
        $user = User::find($session_id);

        return response()->json($user);
    }
}
