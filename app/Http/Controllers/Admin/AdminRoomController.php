<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;
use App\Models\Amenity;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view('admin.room_view', compact('rooms'));
    }

    public function room_create()
    {
        $all_amenities = Amenity::get();
        return view('admin.room_create', compact('all_amenities'));
    }

    public function room_store(Request $request)
    {

        //dd($request->amenities);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
            'video_id' => 'required',
            'featured_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $amenities = '';
        $i = 0;
        if (isset($request->amenities)) {

            foreach ($request->amenities as $item) {
                if ($i == 0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ',' . $item;
                }

                $i++;
            }
        }

        $rooms = new Room();

        $now = time();
        $ext = $request->file('featured_photo')->extension();
        $final_name = 'room_' . $now . '.' . $ext;
        $request->file('featured_photo')->move(public_path('uploads/'), $final_name);
        $rooms->featured_photo = $final_name;


        $rooms->name = $request->name;
        $rooms->description = $request->description;
        $rooms->price = $request->price;
        $rooms->total_rooms = $request->total_rooms;
        $rooms->amenities = $amenities;
        $rooms->size = $request->size;
        $rooms->total_beds = $request->total_beds;
        $rooms->total_bathrooms = $request->total_bathrooms;
        $rooms->total_balconies = $request->total_balconies;
        $rooms->total_guests = $request->total_guests;
        $rooms->video_id = $request->video_id;
        $rooms->save();

        return redirect()->route('admin_room_view')->with('success', 'Room Saved Successfully');
    }
}
