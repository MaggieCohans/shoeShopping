<?php

namespace App\Http\Controllers;
use App\Models\Product_au;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
     
class HomeController extends Controller
{
    public function index()  {
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                $datapro=Product_au::paginate(3);
                return view('home.userpage',compact('datapro'))->with('i',(request()->input('page',1)-1)*5);
            }
            elseif ($usertype=='admin') {
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }

        }
    }

    public function home()  {
        
        $datapro=Product_au::paginate(3);
        return view('home.userpage',compact('datapro'))->with('i',(request()->input('page',1)-1)*5);
           
    }

    public function product_detail($id)  {
        
        $data = Product_au::find($id);
        return view('home.product_detail',compact('data'));
           
    }

    public function add_cart(Request $request,$id)  {
        
        if(Auth::id()){
            $user=Auth::user();
            $product=Product_au::find($id);
            $cart=new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            if( $product->price!=null){
                $cart->price=$product->discount_price*$request->quantity;
            }
            else{
                $cart->price=$product->price*$request->quantity;
            }
          
            $cart->product_id=$product->id;
            $cart->image=$product->image;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
              

        }
        else{
            return redirect('login');
        }
           
    }
    public function show_cart()  {
       if(Auth::id()){
        $id=Auth::user()->id;

        $data = Cart::where('user_id','=',$id)->get();
       
        return view('home.show_cart',compact('data'));
       }
       else{
        return redirect('login');
       }
        
           
    }
    public function delete_cart($id)  {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
           
    }

    public function cash_order()  {
        $user_id=Auth::user()->id;

        $data = Cart::where('user_id','=',$user_id)->get();
        foreach($data as $data){
            $order=new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->product_title=$data->product_title;
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->user_id=$data->user_id;
            $order->deliver_status="On Processing";
            $order->payment_status=" Cash On Delivery";
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();

        }
    
        $data->delete();
        return redirect()->back()->with('message','We have received your order. We will inform you soon!');
           
    }
    public function stripe($total_price)  {
        return view('home.stripe',compact('total_price'));
            
     }
     public function stripePost(Request $request,$total_price)
    {
       
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total_price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);
        $user_id=Auth::user()->id;

        $data = Cart::where('user_id','=',$user_id)->get();
        foreach($data as $data){
            $order=new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->product_title=$data->product_title;
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->user_id=$data->user_id;
            $order->deliver_status="Paid";
            $order->payment_status=" Cash On Delivery";
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();

        }
    
       
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }


    
}
