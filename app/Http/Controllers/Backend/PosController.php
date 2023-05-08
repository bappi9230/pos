<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function Pos(){

        $product = Product::latest()->get();
        $customer = Customer::latest()->get();
        $cart_content = Cart::content();
        return view('backend.pos.pos_page',compact('product','customer','cart_content'));
    } //end method

    public function AddToCart(Request $request){

        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => 20,
            'options' => ['size' => 'large']]);


        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method

    public function UpdateQty(Request $request,$rowId){

        $qty = $request->qty;
        Cart::update($rowId,$qty);

        $notification = array(
            'message' => 'Cart Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }  //end method

    public function RemoveItem($rowId){

        Cart::remove($rowId);

        $notification = array(
            'message' => 'Remove Cart Item Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method


    public function CreateInvoice(Request $request){

        $contents = Cart::content();
        $cust_id = $request->customer_id;
        $customer = Customer::where('id',$cust_id)->first();
        return view('backend.invoice.product_invoice',compact('contents','customer'));

    } // End Method



}
