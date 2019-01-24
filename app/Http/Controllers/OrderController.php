<?php

namespace App\Http\Controllers;
use App\Order;
use App\Partner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::with(['partner', 'order_products', 'products'])->paginate(20);

        return view('order.list')->with([
            'orders' => $orders,
            'page_title' => 'Список заказов',
        ]);
    }

    public function edit($id){

        $partners = Partner::all();
        $order = Order::with(['partner', 'order_products', 'products'])->findOrFail($id);

        return view('order.edit', compact('order','partners'))->with('page_title', 'Редактирование заказа №'.$id);
    }

    public function update(Request $request){

        $data = $this->validate($request, [
            'client_email' => 'bail|required|email',
            'partner_id' => 'required|exists:partners,id',
            'status' => 'required|in:0,10,20',
            'id' => 'required|exists:orders,id'
        ]);

        $order = Order::where('id', $request->input('id'));
        $order->update($data);

        return redirect(route('list'));
    }
}