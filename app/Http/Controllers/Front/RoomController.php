<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{

    public function index()
    {
        $room_data = Room::paginate(16);
        return view('Front.room', compact('room_data'));
    }

    public function detail($id)
    {
        $room_detail = Room::with('rRoomPhoto')->where('id', $id)->first();

       // dd($room_detail->rRoomPhoto);

        // foreach ($room_detail->rRoomPhoto as $item) {
        //   echo $item->photo;
        // }

        return view('Front.room_detail', compact('room_detail'));
    }
}
