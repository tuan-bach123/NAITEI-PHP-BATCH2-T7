<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmed;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\OrderDetail;

use App\Models\ShoppingCart;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OrderController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $orderItems = $user->shoppingCarts->find(session('card_id'))->shoppingCartItems;

        $userLocation = $user->userAddresses()->where('is_default', true)->first();
        $defaultAddress = $userLocation ? $userLocation->address : null;

        $totalPrice = $orderItems->sum(function ($item) {
            return $item->product()->price * $item->qty;
        });

        return view('components.orders.index', compact('user', 'orderItems', 'defaultAddress', 'totalPrice'));
    }

    public function store(Request $request): RedirectResponse
    {
        $orderDetail = null;

        DB::transaction(function () use ($request, &$orderDetail) {
            // dd(request()->all());
            $orderStatus = OrderStatus::create([
                'status' => 'Pending',
            ]);

            $orderDetail = OrderDetail::create([
                'user_id' => $request->user_id,
                'address_id' => $request->address_id,
                'order_date' => $request->order_date,
                'order_total' => $request->order_total,
                'order_status_id' => $orderStatus->id,
            ]);

            foreach ($request->order_items as $item) {
                OrderItem::create([
                    'order_detail_id' => $orderDetail->id,
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                ]);
            }
        });

        $mailedOrderDetail = OrderDetail::with('user')
            ->where('user_id', $request->user()->id)
            ->get()
            ->sortBy('order_details.order_date')
            ->first();

        Mail::to($request->user()->email)->send(new OrderConfirmed($mailedOrderDetail, $request->user()->first_name));

        return redirect('/order-details');
    }

    public function showConfirmation($order_id): View
    {
        $orderDetail = OrderDetail::with(['user', 'address'])->findOrFail($order_id);

        return view('components.orders.confirmation', [
            'orderDetail' => $orderDetail,
            'user' => $orderDetail->user,
            'address' => $orderDetail->address,
        ]);
    }
}
