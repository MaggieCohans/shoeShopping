<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product_au;
use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
//use Barryvdh\DomPDF\PDF;
//use PDF;

class AdminController extends Controller
{
    //CATEGORY
    public function view_category()  {
        $data=Category::all();
        return view('admin.category',compact('data'));
           
    }
    public function add_category(Request $request)  {
        
        $product=new Category();
       
        $product->category_name= $request->input('category_name');
        $product->save();
        return redirect()->back()->with('message','Add Category Successfully!');
           
    }
    public function delete_category($id)  {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Delete Category Successfully!');
           
    }

    //PRODUCT
    public function view_product()  {
        $data=Category::all();
        return view('admin.product',compact('data'));
           
    }
    public function add_product(Request $request)  {
        // $data=Category::all();
        $file= $request->image;
        $ext= $request->image->extension();
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('product_img'),$file_name);
        $request->merge(['image'=>$file_name]);
        Product_au::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'discount_price'=>$request->discount_price,
            'category'=>$request->category,
            'image'=>$file_name
    
            ]
           );
           return redirect()->back()->with('message','Add Product Successfully!');

            
     }
     public function show_product()  {
         $data=Product_au::all();
       
           return view('admin.show_product',compact('data'));

            
     }
     public function delete_product($id)  {
        $data = Product_au::find($id);
        $data->delete();
        return redirect()->back()->with('message','Delete Product Successfully!');
           
    }
    public function update_product($id)  {
        $data = Product_au::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('data','category'));
           
    }
    public function update_product_confirm(Request $request,$id)  {
        $product = Product_au::find($id);
        $product->title= $request->title;
        $product->description= $request->description;
        $product->quantity= $request->quantity;
        $product->price= $request->price;
        $product->discount_price= $request->discount_price;
        $product->category= $request->category;
        $file= $request->image;
        if($file){
            $ext= $request->image->extension();
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('product_img'),$file_name);
            $request->merge(['image'=>$file_name]);
            $product->image= $file_name;
        }
        
        $product->save();
        return redirect()->back()->with('message','Update Product Successfully!');
           
    }
    public function order()  {
        $data=Order::all();
      
          return view('admin.order',compact('data'));

           
    }
    public function delivered($id)  {
        $data = Order::find($id);
        $data->deliver_status="delivered";
        $data->payment_status="Paid";
        $data->save();
        return redirect()->back();
           
    }
    public function print($id)  {
        $data = Order::find($id);
        $pdf=PDF::loadView('admin.pdf', compact('data'));

        return $pdf->download('pdf_detail.pdf');
           
    }
    public function search(Request $request)  {
        $searchtxt = $request->search;
        $data=Order::where('product_title','LIKE',"%$searchtxt%")->orWhere('name','LIKE',"%$searchtxt%")->get();
        return view('admin.order',compact('data'));
           
    }
}
