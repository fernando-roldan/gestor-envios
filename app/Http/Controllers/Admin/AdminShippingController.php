<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminShippingController extends Controller
{
    public function index() 
    {
        $this->authorize('read shippings');

        $user = auth()->user();
        $role = $user->getRoleAttribute();
        
        $statuces = Status::all();
        $statusMap = [
            1 => ['class' => 'badge-phoenix-secondary', 'icon' => 'fa-stream'],
            2 => ['class' => 'badge-phoenix-primary', 'icon' => 'fa-shipping-fast'],
            3 => ['class' => 'badge-phoenix-primary', 'icon' => 'fa-shipping-fast'],
            4 => ['class' => 'badge-phoenix-success', 'icon' => 'fa-check'],
            5 => ['class' => 'badge-phoenix-warning', 'icon' => 'fa-box'],
            6 => ['class' => 'badge-phoenix-info', 'icon' => 'fa-dolly'],
            7 => ['class' => 'badge-phoenix-info', 'icon' => 'fa-dolly'],
            8 => ['class' => 'badge-phoenix-danger', 'icon' => 'fa-ban'],
        ];

        if(in_array($role, ['admin', 'super-admin'])) {

            $shippings = Shipping::with('customer', 'status', 'product', 'user')->latest()->get();
            $route = 'admin.shipping.index';

        } elseif($role === 'provider') {

            $shippings = Shipping::with('customer', 'status', 'product', 'user')
                ->where('user_id', $user->id)
                ->latest()->get();
                
            $route = 'provider.shipping.index';
        } else {

            return view('error_403');
        }
        //dd($statuces);

        return view($route, compact('shippings', 'statuces', 'statusMap'));
    }

    public function create()
    {
        return view('shippings.create', [
            'customers' => User::role('cliente')->get(),
            'providers' => User::role('proveedor')->get(),
            'statuses'  => Status::all(),
            'products'  => Product::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create shippings');

        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:statuses,id',
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'currency' => 'required|string|max:5',
            'cost' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $shipping = Shipping::create([
            'uuid' => str::uuid(),
            'customer_id' => $request->customer_id,
            'status_id' => $request->status_id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'currency' => $request->currency,
            'cost' => $request->cost,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('admin.shipping.index')->with('success', 'Envío creado correctamente.');
    }

    public function show(Shipping $shipping)
    {
        $shipping->load('quotes', 'status', 'customer', 'provider', 'product');

        return view('admin.shipping.show', compact('shipping'));
    }

    public function uploadDocument(Request $request, Shipping $shipping)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('pdf')->store('quotes', 'public');

        $shipping->quote()->create(['file_path' => $path]);

        return redirect()->back()->with('success', 'PDF subido correctamente.');
    }

    public function editStatus(Shipping $shipping)
    {
        return view('admin.shippings.edit-status', [
            'shipping' => $shipping,
            'statuses' => Status::all()
        ]);
    }
}
