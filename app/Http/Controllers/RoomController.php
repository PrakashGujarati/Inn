<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
        //$roomtype = RoomType::pluck('name', 'id');
        //return View('RoomMaster.Room.add',compact('rooms','roomtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $roomtype = RoomType::pluck('name', 'id');
        return View('RoomMaster.Room.add',compact('rooms','roomtype'));
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
            'roomtype_id' => 'required',
            'room_no' => 'required',
            'capacity' => 'required',
            'extension_no' => 'required',
        ]);

        // return $request->all();
        Room::create($request->all());

        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $roomtype = RoomType::pluck('name', 'id');
        $rooms = Room::findOrFail($room->id);
        return View('RoomMaster.Room.edit',compact(["rooms","roomtype"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'roomtype_id' => 'required',
            'room_no' => 'required',
            'capacity' => 'required',
            'extension_no' => 'required',
        ]);

        $rooms = Room::findOrFail($room->id);
        $rooms->update($request->all());
        return redirect('/rooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Tariff::destroy($request->id);
        return Response('Success');
    }
}
