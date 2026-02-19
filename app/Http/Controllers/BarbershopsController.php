<?php

namespace App\Http\Controllers;

use App\Models\Barbershop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarbershopsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barbershop = Barbershop::all();

        return view('auth.admin.barbershops.index', compact('barbershop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.admin.barbershops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:barbershops,slug',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'zip_code' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
        ]);

        Barbershop::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'logo' => $request->logo ? $request->file('logo')->store('logos', 'public') : null,
            'cover_image' => $request->cover_image ? $request->file('cover_image')->store('cover_images', 'public') : null,
            'phone' => $request->phone,
            'email' => $request->email,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
        ]);

        return redirect()->route('barbershops.index')->with('success', 'Barbershop created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barbershop $barbershop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barbershop $barbershop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barbershop $barbershop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barbershop $barbershop)
    {
        //
    }
}
