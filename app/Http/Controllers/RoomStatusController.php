<?php

namespace App\Http\Controllers;

use App\RoomStatus;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomstatus = RoomStatus::all();
        return View('RoomMaster.RoomStatus.list',compact('roomstatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('RoomMaster.RoomStatus.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'color' => 'required'
        ]);

        // return $request->all();
        RoomStatus::create($request->all());

        return redirect('/roomstatus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomStatus  $roomStatus
     * @return \Illuminate\Http\Response
     */
    public function show(RoomStatus $roomstatus)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomStatus  $roomStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomStatus $roomstatus)
    {
        $roomstatus = RoomStatus::findOrFail($roomstatus->id);
        return View('RoomMaster.RoomStatus.edit',compact(["roomstatus"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomStatus  $roomStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomStatus $roomstatus)
    {
        $request->validate([
            'status' => 'required',
            'color' => 'required'
        ]);
        $roomstatus = RoomStatus::findOrFail($roomstatus->id);
        $roomstatus->update($request->all());
        return redirect('/roomstatus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomStatus  $roomStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomStatus $roomStatus)
    {
        //
    }
}
