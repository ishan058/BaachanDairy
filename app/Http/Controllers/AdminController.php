<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Order;


class AdminController extends Controller
{

    public function addproduct(Request $request)
    {
        $data = new product;
        $image = $request->file;
        
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);

        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->des;
        $data->quantity=$request->quantity;
        $data->type=$request->type;

        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function showproduct()
    {
        $data = product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {
        $data=product::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');

    }

    public function updateview($id)
    {
        $data = product::find($id);
        return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request, $id)
    {
        $data = product::find($id);
        $image = $request->file;
        
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;
        }

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->des;
        $data->quantity=$request->quantity;
        $data->type=$request->type;


        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully');
    }

    public function showorder()
    {
        $order = order::all();
        return view ('admin.showorder',compact('order'));
    }
    public function deleteorder($id)
    {
        
        $data=order::find($id);
        $data->delete();

        return redirect()->back()->with('message','Order Deleted Successfully');

    }

    public function showmessage()
    {
        $info = contact::all();
        return view('admin.showmessage',compact('info'));
    }

    public function deletemessage($id)
    {
        $info=contact::find($id);
        $info->delete();

        return redirect()->back()->with('message','Message Deleted Successfully');

    }


    public function updatestatus($id)
    {
        $order = order::find($id);
        $order->status='delivered';

        $order->save();

        return redirect()->back();
    }

}
