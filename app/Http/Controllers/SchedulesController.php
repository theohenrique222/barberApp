<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Data',
            'Início',
            'Fim',
            'Disponibilidade',
            'Actions',
        ];
    
        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                  <i class="fa fa-lg fa-fw fa-trash"></i>
                              </button>';
        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                   <i class="fa fa-lg fa-fw fa-eye"></i>
                               </button>';
    
        $barbers = Barber::with('user')->get();

        return view('auth.admin.schedules.index', compact('barbers', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barbers = Barber::all();
        
        return view('auth.admin.schedules.create', compact('barbers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'barber_id' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'interval_minutes' => 'required|integer|min:1',
        ]);
        
        $start = strtotime($request->start_time);
        $end = strtotime($request->end_time);

        while ($start < $end) {
            $slot_end = $start + ($request->interval_minutes * 60);
            if ($slot_end > $end) break;

            
            Schedule::create([
                'barber_id' => $request->barber_id,
                'date' => $request->date,
                'start_time' => date('H:i:s', $start),
                'end_time' => date('H:i:s', $slot_end),
                'is_available' => true,
            ]);
            
            
            $start = $slot_end;

        }
        return redirect()->route('schedules.index')->with('success', 'Horários criados com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $barbers = Barber::all();
        return view('auth.admin.schedules.edit', compact('schedule', 'barbers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
