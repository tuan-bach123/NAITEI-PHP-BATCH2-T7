<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Str;

use App\Models\Address;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $address = new Address();
        $address->id = Str::uuid();
        $address->address_line1 = $request->input('address');
        $address->address_line2 = $request->input('street');
        $address->city = $request->input('city');
        $address->state = $request->input('state');
        $address->country_id = $request->input('country');
        $address->postal_code = $request->input('postal_code') ?? "10000";
        $address->save();

        $user = Auth::user();
        $userLocation = $user->userAddresses()->where('is_default', true)->first();
        if ($userLocation) {
            $userLocation->is_default = 0;
            $userLocation->save();
        }

        $new_address = new UserAddress();
        $new_address->id = Str::uuid();
        $new_address->user_id = $user->id;
        $new_address->address_id = $address->id;
        $new_address->is_default = 1;
        $new_address->save();

        return redirect()->back()->with('success', 'Added new address!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
