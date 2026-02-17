<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.admin.appointment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::where('role', 'client')->get();
        $barbers = User::where('role', 'barber')->get();
        $services = Service::all();

        return view('auth.admin.appointment.create', compact('clients', 'barbers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'barber_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_time' => 'required|date_format:Y-m-d\TH:i',
        ]);


        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
