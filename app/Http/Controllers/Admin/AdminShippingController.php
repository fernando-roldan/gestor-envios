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
        $shippings = Shipping::with('customer', 'status', 'product', 'provider')->latest()->get();

        //dd($shippings);

        return view('admin.shipping.index', compact('shippings'));
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
