<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function registerUser(Request $req){

        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,        
           'password' => Hash::make($req->password),
           'phone' => $req->phone,        
           'address' => $req->address,        
        ]);
        return redirect()->route('login');
    }    

    public function loginUser(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($req->only('email', 'password')))
        {   
            $user_type = Auth::user()->user_type;

            if($user_type=='1')
            {
                return view('admin.dashboard');
            
            }
            else
            {
                session()->put('userId',1);
                $data = product::paginate(4);
                $user = auth()->user();
                $count = cart::where('phone',$user->phone)->count();
                return view('home',compact('data','count'));
    
            }
        }
        else
        {
            return back()->with('fail', 'User Not Found');
        }
    }


    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
