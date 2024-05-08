<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Payment;
use App\Models\Product;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;        //random
use Illuminate\Support\Facades\DB; //db

use Barryvdh\DomPDF\Facade as PDF;



class CartController extends Controller
{

    public function Cart()
    {
        if (session()->get('id') == null) {
            return redirect()->route('login');
        } else {
            $cart = Cart::where('CustomerId', session()->get('id'))->get();

            if (session()->get('id') == null) {
                session()->put('count', 0);
            } else {

                $count = Cart::where('CustomerId', session()->get('id'))->count();
                session()->put('count', $count);
            }
            $t = Cart::Where('CustomerId', session()->get('id'))->sum('Price');
            $q = Cart::where('CustomerId', session()->get('id'))->sum('Qty');
            $amount = $t * $q;
            return View('user.cart', compact('cart', 'amount'));
        }

        return View('user.cart');
    }

    public function AddCart(Request $request)
    {
        if (session()->get('id') == null) {
            return redirect()->route('login');
        } else {
            $data = $request->except('_token');
            $data = [
                'CustomerId' => session()->get('id'),
                'ProductName' => $request->ProductName,
                'ProdId' => $request->ProdId,
                'Image' => $request->Image,
                'Qty' => 1,
                'Price' => $request->Price,
            ];
            Cart::create($data);
            return redirect()->route('cart')->withInfom('Item Add Successfully!!');
        }
    }
    public function CartShow($id)
    {
        $product = Cart::where('ProdId', $id)->where('CustomerId', session()->get('id'))->first();

        return View('user.updatecart', compact('product'));
    }

    public function CartUpdate(Request $request, $id)
    {
        $cart = Cart::where('ProdId', $id)->where('CustomerId', session()->get('id'))->first();
        $cart->Qty = $request->Qty;
        $cart->save();
        return redirect()->route('cart')->withInfom('Cart Update Successfully');
    }

    public function Cartdelete($id)
    {
        $cart = Cart::where('ProdId', $id)->where('CustomerId', session()->get('id'))->first();
        $cart->delete();
        return redirect()->route('cart')->withInfom('Cart Item Remove Successfully!!');
    }

    public function Payment()
    {
        $cart = Cart::where('CustomerId', session()->get('id'))->get();
        return View('user.payment', compact('cart'));
    }

    public function Checkout(Request $request)
    {
        $request->validate([
            'CardName' => 'required',
            'CardNo' => 'required|numeric',
            'ExpDate' => 'required',
            'Cvv' => 'required|numeric'
        ]);

        $paymid =  rand();
        session()->put('pay', $paymid);
        $data = $request->except('_token');
        $data['PaymentId'] = $paymid;
        Payment::create($data);
        $cart = Cart::where('CustomerId', session()->get('id'))->get();

        foreach ($cart as $crt) {
            $ordno = Str::random(40);
            $order = new Order();
            $order->OrderNo = $ordno;
            $order->ProductId = $crt->ProdId;
            $order->Qty = $crt->Qty;
            $order->CustomerId = session()->get('id');
            $order->PaymentId = $paymid;
            $order->Status = 'Pending';
            $order->save();

            $otem = new Orderitem();
            $otem->ProductId = $crt->ProdId;
            $otem->Qty = $crt->Qty;
            $otem->Price = $crt->Price;
            $otem->OrderId = $ordno;
            $otem->save();
            $dum = Cart::where('CustomerId', session()->get('id'))->first();
            $dum->delete();
        }


        return redirect()->route('invoice')->withInfom('your Item Order comformed !!!');
    }

    public function Invoice()
    {
        $ordr = Order::where('CustomerId', session()->get('id'))->get();
        $cart = DB::table('orders')->join('products', 'orders.ProductId', '=', 'products.id')->where('PaymentId', session()->get('pay'))->get();
        $time = date('d/m/Y');
        return View('user.invoice', compact('cart', 'time'));
    }


    public function PDF()
    {
        $ordr = Order::where('CustomerId', session()->get('id'))->get();
        $cart = DB::table('orders')->join('products', 'orders.ProductId', '=', 'products.id')->where('PaymentId', session()->get('pay'))->get();
        $time = date('d/m/Y');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('user.pdf', compact('cart', 'time'));
        return $pdf->download('RC' . time() . '.pdf');
    }



    
}
