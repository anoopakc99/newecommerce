<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data =new Category;
        $data->category_name=$request->category_name;
        $data->save();
        return redirect()->back()->with('message','Category Added Succssfully');
       
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Succssfully');
    }

    //Product 

    public function view_product()
    {
        $category=category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product =new Product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image=$imagename;


        
        $product->save();
        return redirect()->back()->with('message','Product Added Succssfully');
    }

    //All product show 
    public function show_product()
    {
        $product=Product::all();
        return view ('admin.show_product',compact('product'));
    }

    //Product Deleted
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Succssfully');
    }

    //Product Edit

    public function update_product($id)
    {
        $product = Product::find($id);

        $category= Category::all();
        return view ('admin.update_product',compact('product','category'));
    }

    //Product update
    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);
    
            $product->image=$imagename;
        }

       
          
        $product->save();
        return redirect()->back()->with('message','Product Updated Succssfully');
    }

    // Order route

    public function order()
    {
        $order=Order::all();
        return view('admin.order',compact('order'));
    }

    //delivered button status
    public function delivered ($id)
    {
        $order = order::find($id);
        $order->delivery_status="delivered";

        $order->payment_status="paid";
        $order->save();
        return redirect()->back();
    }
}
