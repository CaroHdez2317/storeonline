<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

use App\Order;
use App\OrderItem;


class CartController extends Controller
{
        public function __construct()
    {
        if(!\Session::has('cart')) \Session::put('cart', array());
    }

    //show cart
    public function show(){
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('store.cart', compact('cart', 'total'));
    }

    //add item
    public function add(Product $product){
        $cart = \Session::get('cart');
        $product->quantity=1;
        $cart[$product->slug]=$product;
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    //delete item
    public function delete(Product $product){
        $cart =\Session::get('cart');
        unset($cart[$product->slug]);
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    //update item
    public function update(Product $product, $quantity)
    {
        $cart = \Session::get('cart');
        $cart[$product->slug]->quantity = $quantity;
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    //trash item
    public function trash(){
        \Session::forget('cart');

        return redirect()->route('cart-show');
    }

    //total
    private function total(){
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $item)
        {
            $total += $item->price * $item->quantity;
        }

        return $total;
    }

    //Detalle de pedido
    public function orderDetail(){
        if (count(\Session::get('cart'))<= 0) return redirect()->route('home');
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('store.order-detail', compact('cart', 'total'));
    }

    //Guardar pedido
    public function getOrder(){
        $this->saveOrder(\Session::get('cart'));
        \Session::forget('cart');

        return \Redirect::route('home')->with('message', 'Compra realizada de forma correcta');
    }


     //Tickets
    private function saveOrder($cart)
    {
        $subtotal = 0;
        foreach($cart as $item){
            $subtotal += $item->price * $item->quantity;
        }
        
        $order = Order::create([
            'subtotal' => $subtotal,
            'user_id' => \Auth::user()->id
        ]);
        
        foreach($cart as $item){
            $this->saveOrderItem($item, $order->id);
        }
    }
    
    private function saveOrderItem($item, $order_id)
    {
        OrderItem::create([
            'quantity' => $item->quantity,
            'price' => $item->price,
            'product_id' => $item->id,
            'order_id' => $order_id
        ]);
    }

}
