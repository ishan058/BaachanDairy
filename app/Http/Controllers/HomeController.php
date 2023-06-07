<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Contact;

class HomeController extends Controller
{
    //


    public function home()
    {
        $data = product::paginate(5);
        $user = auth()->user();
        if(!$user) {
            return view('home',compact('data'));
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('home',compact('data','count'));
    }

    public function about()
    {
        $data = product::all();
        $user = auth()->user();
        if(!$user) {
            return view('about',compact('data'));            
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('about',compact('data','count'));
    }

    public function product()
    {
        $data = product::all();
        $user = auth()->user();
        if(!$user) {
            return view('product',compact('data'));
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('product',compact('data','count'));
    }

    public function contact()
    {
        $data = product::all();
        $user = auth()->user();
        if(!$user) {
            return view('contact',compact('data'));
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('contact',compact('data','count'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }



    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function addproduct()
    {
        return view('admin.addproduct');
    }
    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = auth()->user();
            $product = product::find($id);

            $cart = new cart;
            $image = $request->file;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            $cart->price=$product->price;
            $cart->image=$product->image;
            $cart->quantity=$request->quantity;
            $cart->save();

            return back()->with('message','Product Added to Cart');

        }
        else
        {
            return redirect('login');
        }
    }
    public function newmessage(Request $request)
    {
        $info = new contact();

        $info->Name=$request->name;
        $info->Email=$request->email;
        $info->Phone=$request->phone;
        $info->Message=$request->message;
        $info->save();

        return redirect()->back()->with('message','Message sent successfully');
    }

    public function showcart()
    {
        $user = auth()->user();
        $cart=cart::where('phone',$user->phone)->get();
        $count = cart::where('phone',$user->phone)->count();
        return view('showcart',compact('count','cart'));
    }

        public function deletecart($id)
    {
        $data=cart::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product Deleted from Cart');
    }

    public function confirmorder(Request $request)
    {
        $user=auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $email=$user->email;
        $address=$user->address;
 

        foreach($request->productname as $key=>$productname)
        {
            $order = new order;
            

            $order -> product_name=$request->productname[$key];
            $order -> price=$request->price[$key];
            $order -> quantity=$request->quantity[$key];
            $order -> name=$name;
            $order -> phone=$phone;
            $order -> email=$email;
            $order -> address=$address;
            $order -> status="not delivered";

            $order->save();
        }

        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Order Successful');
    }

    public function myorder()
    {
        $user = auth()->user();
        $cart=cart::where('phone',$user->phone)->get();
        $count = cart::where('phone',$user->phone)->count();
        $order = order::where('email',auth()->user()->email)->get();    

        return view ('myorder',compact('count','order'));
    }
}
