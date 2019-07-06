<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard.home');
           // return view('admin',['url' => 'admin']);
    }
    // public function facaltylist()   
    // {  
    //     $facalties = Facalty::all();
    //     return view('admin.facilities.index')->withFacalties($facalties);   
    // }
    // public function orderlist()   
    // {  
    //     //$orders = Order::all();
    //     $orders = DB::select( DB::raw("SELECT  `users`.`name`,`users`.`email`,`orders`.*, `users`.`name`
    //     FROM `orders`
    //     INNER JOIN `users` ON `orders`.`user_id`=`users`.`id` WHERE `orders`.`order_status`!=''") );
    //     return view('admin.orders.index')->withOrders($orders);   
    // }
    public function userlist()   
    { 
        $users = User::all();
        return view('admin.users.index')->withUsers($users);   
    }
    // public function order_statusupdate(Request $request)
    // {
    //     $order = Order::find($request->id);
    //     //echo $order->order_id;
    //    // $order->shipping_status = ($request->shipping_status) ? $request->shipping_status : '';
    //     $order->tracking_no =( $request->tracking_no) ? $request->tracking_no : '';
    //     $order->courier_name =( $request->courier_name ) ?  $request->courier_name : '';
    //     $order->save(); 
    //     session()->flash('success', 'Order successfully updated.');
    //     $orders = Order::all();
    //     return view('admin.orders.index')->withOrders($orders);   
       
    // }
    // public function orderedit($id)
    // {
    //     $order = Order::find($id);
    //     return view('admin.orders.edit')->withOrder($order);
    // }
}
