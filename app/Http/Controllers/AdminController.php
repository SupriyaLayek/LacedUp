<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Auth;
use App\OrderDetail;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{   
        /* Admin Main view*/
    public function index(){

          //Registered users chart
    $chart_options = [
    'chart_title' => 'Registered users by months',
    'report_type' => 'group_by_date',
    'model' => 'App\User',
    'group_by_field' => 'created_at',
    'group_by_period' => 'month',
    'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);

            //transactions chart
         $chart_options = [
        'chart_title' => 'Transactions by dates',
        'report_type' => 'group_by_date',
        'model' => 'App\Order',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'aggregate_function' => 'sum',
        'aggregate_field' => 'total_Price',
        'chart_type' => 'line',
    ];
     $chart1 = new LaravelChart($chart_options);

            //products added per month
         $chart_options = [
        'chart_title' => 'Products added by months',
    'report_type' => 'group_by_date',
    'model' => 'App\Product',
    'group_by_field' => 'created_at',
    'group_by_period' => 'month',
    'chart_type' => 'pie',
    ];
      
         $chart2 = new LaravelChart($chart_options);


        return view('admin.index', compact('chart','chart1','chart2')); 
    }

   
          /* Users listing on the admin portal */
    public function getUser(Request $request){
    	$users =  User::orderBy('created_at', 'desc')->get(); //sort the listing according to recently created order
    	return view('admin.adminPages.user.users',compact('users'));
    }
     public function orders(){

   	$orders = Order::orderBy('created_at', 'desc')->paginate(10);
   	return view('admin.adminPages.Orders.orders', compact('orders'));
   }

    /* My order for each user*/
   public function getOrder(){
   
        $orders = Auth::User()->orders()->orderBy('id','desc')->paginate(4);      
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;


        });
      
        return view('Pages.myOrders')->with(compact('orders'));
   }
   
    // public function detailOrder($id){
    //     //dd($id);
    //     $orderdetails = OrderDetail::where('id',$id)->where('user_id',Auth::User()->id)->get(); 
    //   // dd($orderdetails);

    //     return view('Pages.orderdetail', compact('orderdetails'));
    // }



    /* Detailed order listing in admin panel*/
    public function orderDetails($id){
  
           $orderdetail = OrderDetail::where(['order_id'=>$id])->get();   
      
        return view('admin.adminPages.Orders.orderDetails', compact('orderdetail'));
    }
}
