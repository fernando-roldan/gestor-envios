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

        return Shipping::with(['status', 'user'])->get();
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
}
