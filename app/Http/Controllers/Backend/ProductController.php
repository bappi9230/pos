<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class ProductController extends Controller
{
    public function AllProduct(){

        $product = Product::latest()->get();

        return view('backend.product.all_product',compact('product'));

    } // End Method

    public function AddProduct(){

        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        return view('backend.product.add_product',compact('category','supplier'));
    }// End Method


    public function StoreProduct(Request $request){

        $request->validate([
            'product_code' => 'unique:products',
        ],[
            'product_code.unique' => 'Product code Must Be Unique'
        ]);


        $arr = ['AA','BB','CC','DD','EE','FF'];
        $product_code = $arr[array_rand($arr)].'-'.rand(10000000,99999999);

        $image = $request->file('product_image');
        $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/product/' . $image_rename);
        $image_url = 'upload/product/' . $image_rename;

        Product::insert([

            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'product_code' => $product_code,
            'product_garage' => $request->product_garage,
            'product_store' => $request->product_store,
            'buying_date' => $request->buying_date,
            'expire_date' => $request->expire_date,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'product_image' => $image_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    } // End Method

    public function EditProduct($id){
        $product = Product::findOrFail($id);
        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        return view('backend.product.edit_product',compact('product','category','supplier'));

    } // End Method


    public function UpdateProduct(Request $request,$id){

        $product_id = Product::findOrFail($id);
        $old_image = $product_id->product_image;

        if ($request->file('product_image')) {
            $image = $request->file('product_image');
            unlink($old_image);
            $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/product/' . $image_rename);
            $image_url = 'upload/product/' . $image_rename;
            Product::findOrFail($id)->update([

                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
//                'product_code' => $request->product_code,
                'product_garage' => $request->product_garage,
                'product_store' => $request->product_store,
                'buying_date' => $request->buying_date,
                'expire_date' => $request->expire_date,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'product_image' => $image_url,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.product')->with($notification);

        } else{

            Product::findOrFail($id)->update([

                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
//                'product_code' => $request->product_code,
                'product_garage' => $request->product_garage,
                'product_store' => $request->product_store,
                'buying_date' => $request->buying_date,
                'expire_date' => $request->expire_date,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.product')->with($notification);

        } // End else Condition


    } // End Method

    public function DeleteProduct($id){

        $product_img = Product::findOrFail($id);
        $old_image = $product_img->product_image;
        unlink($old_image);

        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function BarcodeProduct($id){
        $product = Product::findOrFail($id);
        return view('backend.product.barcode_product',compact('product'));
    }



}
