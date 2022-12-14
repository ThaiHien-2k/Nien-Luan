<?php

namespace App\Http\Controllers;
use App\Order;
use App\User;
use App\Laptop;
use App\Profile;
use App\Comment;
use App\Product;
use App\Insurance;
// use App\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalgross = 0;

        $users = User:: get();
        $totaluser = count($users);

        $orders = Order::get();
        $totalorder = count($orders);
     
        
        
        
        $gross = Order::get();
        $gross->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        foreach ($gross as $x){
           $totalgross+= $x->cart->totalPrice;
        }


        $latest=Order::orderBy('created_at','DESC')->where('status','=','Đã đặt hàng')->take(5)->get();
        
        return view('admin.index',compact('latest','totaluser','totalorder','totalgross',));
    }

    public function order()
    {
        $orders=Order::orderBy('created_at','DESC')->get();
        
        return view('admin.order',compact('orders'));
    }

    public function comment()
    {
        $comments=Comment::orderBy('status','ASC')->orderBy('created_at','ASC')->get();
        $users=User::get();
        $products=Product::get();
        return view('admin.comment',compact('comments','users','products'));
    }

    public function show_order($id)
    {
        $laptopss = new Laptop();
        // if($laptopss->order_id){
            $laptopss->order_id=$id;
            $laptopss->nameOwner=1;
            $laptopss->phone=1;
            $laptopss->save();

        // }
        
        $laptops= Laptop::where('order_id',$id)->orderBy('created_at', 'DESC')->get();
        $ids =DB::table('orders')->where('id',$id)->get();

        $order =DB::table('orders')->where('id',$id)->get();
        $order->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        Laptop::where('serial','=',null)->delete();
        // dd($laptops);
        return view('admin.showorder',compact('order','ids','laptops'));
    }

    public function user()
    {
        $users=DB::table('users')->orderBy('users.id', 'ASC')->leftjoin('profiles','users.id','=','profiles.user_id')->get();
        return view('admin.user',compact('users'));
    }
    public function removeUser($id)
    {
        User::where('id',$id)->delete();
        
        return Back()->with('success','Xóa tài khoản thành công!');
    }

   
}