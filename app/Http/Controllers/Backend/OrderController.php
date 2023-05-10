<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function FinalInvoice(Request $request){

        $data =[];

        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['invoice_no'] = 'POS-'.mt_rand(10000000,99999999);
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['created_at'] = Carbon::now();

        $order_id = Order::insertGetId($data);
        $contents = Cart::content();

        foreach ($contents as $content){

            $pdata = [];
            $pdata['order_id'] = $order_id;
            $pdata['product_id'] = $content->id;
            $pdata['quantity'] = $content->qty;
            $pdata['unitcost'] = $content->price;
            $pdata['total'] = $content->total;
            $pdata['created_at'] = Carbon::now();

            Orderdetail::insert($pdata);
        }
        $notification = array(
            'message' => 'Order Complete Successfully',
            'alert-type' => 'success'
        );

        Cart::destroy();

        return redirect()->route('dashboard')->with($notification);
    }

    public function PendingOrder(){

        $orders = Order::where('order_status','pending')->get();
        return view('backend.order.pending_order',compact('orders'));

    }// End Method

    public function OrderDetails($id){

        $order = Order::where('id',$id)->first();

        $orderItem = Orderdetail::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();

        return view('backend.order.order_details',compact('order','orderItem'));
    }//end method

    public function OrderStatus(Request $request){

        $order_id = $request->id;

        $orders = Orderdetail::where('order_id',$order_id)->get();

        foreach ($orders as $order){
            Product::where('id',$order->product_id)
                ->update([
                    'product_store' => DB::raw('product_store -'.$order->quantity)
                ]);
        }


        Order::findOrFail($order_id)->update(['order_status' => 'complete']);

        $notification = array(
            'message'=> 'Order Completed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function CompleteOrder(){

        $orders = Order::where('order_status','complete')->get();
        return view('backend.order.complete_order',compact('orders'));
    }

    public function StockManage(){

        $product = Product::latest()->get();
        return view('backend.stock.all_stock',compact('product'));

    }// End Method

    public function PdfInvoice($id){

        $order = Order::where('id',$id)->first();

        $orderItem = Orderdetail::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();

//        return view('backend.invoice.order_invoice',compact('order','orderItem'));

        $pdf = Pdf::loadView('backend.invoice.order_invoice',compact('order','orderItem'))
            ->setPaper('a4')->setOption(['tempDir',public_path(),'chroot',public_path()]);

        return $pdf->download('invoice.pdf');
    }

}
