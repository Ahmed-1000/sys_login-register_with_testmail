<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\testmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class posts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('pageA'); 
    }

   function viewregister()
   {
       return view('register');
       
   }
  
    
  
    
    function save(Request $request){
        
        $request->validate([
            
            'username'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
        ]);
        
        $admin = new Admin;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();
        
        if($save){
             $details = [
                
                'title' => 'mail from Ahmed',
                'body' => 'welcome new commer'
            ];
            
            Mail::to($request->email)->send(new testmail($details));
            
            return back()->with('success','new add in database');
            
          
        }else{
            return back()->with('fail','try again please');
        }
        
         
    }
    function check(Request $request){
         $request->validate([
            
            
            'username'=>'required',
            'password'=>'required|min:5|max:12'
        ]);
        
        $userInfo = Admin::where( 'username','=', $request->username)->first();
        if(!$userInfo){
           
            return back()->with('fail','we do not recognize your email');
        }else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return  redirect('/Home');    
            }else{
                return back()->with('fail','incorrect password');
            }
        }
        $token = $userInfo->createToken($request->username)->plainTextToken;
        
        $response = [
            'user' =>  $userInfo,
            'token' =>  $token
        ];
        
        return response($response, 201);
        
     
        
    }
    
    function Home(Request $req){
         
        
        $data =['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
       // $data = Admin::where('id','=',session('LoggedUser'))->first();
        return view('home',$data);
       
      
    }
   function viewsetting()
   {
       $data =['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
       // $data = Admin::where('id','=',session('LoggedUser'))->first();
       return view('setting', $data);
       
       
       
   }
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }
    function delete(){
    
         $data =['LoggedUserInfo'=> Admin::where('id','=',session('LoggedUser'))->first()->delete()];
          if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/login');
        }
          
          
       }
    function update(Request $request){
        
         
            $user = $request->input('user');
            $email = $request->input('email');
        
        $update= [
            'username' => $user,
            'email' => $email
            
        ];
            
            
         $data =['LoggedUserInfo'=> Admin::where('id','=',$request->id)->update($update)];
     
        
        return redirect('/setting');
        
    }
    function showdata(){
        $data = Admin::get();
        
        return $data;
        
    }
          
        
    
      
    
    
}