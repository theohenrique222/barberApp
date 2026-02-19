<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Barber;
use App\Models\Schedule;
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
        $appointments = Appointment::with(['client', 'barber', 'service', 'schedule'])->get();
        return view('auth.admin.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::where('role', 'client')->get();
        $barbers = Barber::all();
        $services = Service::all();
        $schedules = Schedule::where('is_avaliable', 1)->get();

        return view('auth.admin.appointment.create', compact('clients', 'barbers', 'services', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'client_id' => 'required|exists:users,id',
            'barber_id' => 'required|exists:barbers,id',
            'service_id' => 'required|exists:services,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        
        Appointment::create([
            'user_id' => $data['client_id'],
            'barber_id' => $data['barber_id'],
            'service_id' => $data['service_id'],
            'schedule_id' => $data['schedule_id'],
            'status' => 'pending'
        ]);
        
        Schedule::where('id', $data['schedule_id'])
            ->update(['is_avaliable' => 0]);
        
        

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
