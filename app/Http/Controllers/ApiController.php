<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Fav;

class ApiController extends BaseController
{
  public function api(){

        if(!Session::get('user_id')){
                return redirect('login');
            }
        
        return view('api');
    }
    
    public function cerca($ricerca){

        if(!Session::get('user_id')){
            return redirect('login');
        }

        $client_id = env('API_CLIENT_ID');
    
    
        $query = urlencode($ricerca);
        $url = 'https://api.unsplash.com/search/photos?per_page=30&client_id='.$client_id.'&query='.$query;
    
        $curl = curl_init($url);
    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
    
        curl_close($curl);
        print_r ($result);
        
    }

    public function inserisci(){
        

        $session = session('user_id');
        $nickname = User::find($session);
        
        $request = request();

        $post = Post::insert([
             'user_id' => $session,
             'nickname' => $nickname->nickname,
             'foto' => $request['foto'],
        ]);



    }

    public function preferiti(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $session = session('user_id');
        $nickname = User::find($session);
        $request = request();
        $post = Fav::insert([
            'user_id' => $session,
            'nickname' => $nickname->nickname,
            'elemento' => $request['foto'],
       ]);

    }
    public function verifico(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $session = session('user_id');
        $request = request();
        
        $trov=Fav::where('elemento', $request['foto'])->where('user_id', $session)->first();

        if($trov != null){
            $ok='ok';
        }else {
            $ok = null;
        }
        return response()->json($ok);
        
    }

    public function remove(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $session = session('user_id');
        $request = request();
        Fav::where('user_id', $session)->where('elemento', $request['foto'])->delete();
        
    }

}
