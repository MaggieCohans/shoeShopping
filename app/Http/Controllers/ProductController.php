<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index1()  {
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                return view('dashboard');
            }
            elseif ($usertype=='admin') {
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }

        }
    }
    public function post()  {
        
        return view('admin.post');
           
    }
    public function detail($id)  {
        $product = Product::findOrFail($id);
        $cart = session()->get('seen-cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
  
        session()->put('seen-cart', $cart);
        return view('details', compact('product'));
           
    }
    public function index()  {
        
        $products = Product::paginate(3);
        return view('products', compact('products'))->with('i',(request()->input('page',1)-1)*5);
           
    }
    public function seencart()
    {
        return view('products-seen');
    }
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
  
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "id_product" => $product->id,
                "product_name" => $product->product_name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
  
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
    public function create(){
        return view('create');
         
        
     } 
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'product_name'=>'required|string|max:25',
            'product_description'=>'required|string|max:25',
            'photo'=>'required|image',
            'price'=>'required|string|max:25',
              
        ]);
       
      /* $product=new Product;
       
       $product->product_name= $request->input('product_name');
       $product->product_description= $request->input('product_description');
       $product->photo= $request->input('photo');
       $product->price= $request->input('price');
       $product->save();*/

      
       $file= $request->photo;
       $ext= $request->photo->extension();
       $file_name = $file->getClientOriginalName();
       $file->move(public_path('img'),$file_name);
       $request->merge(['image'=>$file_name]);
       Product::create([
        'photo'=>$file_name,
        'product_name'=>$request->product_name,
        'product_description'=>$request->product_description,
        'price'=>$request->price,

        ]
       );
       return redirect('shoppingcart')->with('flash_message', 'Added!');


      
        
     }
}

