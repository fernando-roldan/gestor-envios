<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class AdminShippingController extends Controller
{
    public function index() 
    {
        $this->authorize('read shippings');
        $shippings = Shipping::with('customer', 'status', 'product', 'provider')->latest()->get();

        dd($shippings);

        return view('admin.shipping.index', compact('shippings'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->authorize('create shippings');

        return Shipping::create($request->validate([
            'uuid' => 'required|unique:shippings',
            'status_id' => 'required|exists:status,id',
            'user_id' => 'required|exists:users.id'
        ]));
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
}
