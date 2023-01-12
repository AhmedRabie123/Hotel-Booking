<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;
use App\Models\Amenity;
use PhpParser\Node\Stmt\Foreach_;

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
        $final_name = 'photo_room_' . $now . '.' . $ext;
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

    public function room_edit($id)
    {
        $all_amenities = Amenity::get();
        $room_single = Room::where('id', $id)->first();

        $existing_amenities = array();
        if ($room_single->amenities != '') {
            $existing_amenities = explode(',', $room_single->amenities);
        }

        return view('admin.room_edit', compact('room_single', 'all_amenities', 'existing_amenities'));
    }

    public function room_update(Request $request, $id)
    {
        $rooms = Room::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
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

        if ($request->hasFile('featured_photo')) {

            $request->validate([
                'featured_photo' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            unlink(public_path('uploads/' . $rooms->featured_photo));

            $now = time();
            $ext = $request->file('featured_photo')->extension();
            $final_name = 'photo_room_' . $now . '.' . $ext;
            $request->file('featured_photo')->move(public_path('uploads/'), $final_name);
            $rooms->featured_photo = $final_name;
        }

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
        $rooms->update();

        return redirect()->route('admin_room_view')->with('success', 'Room Updated Successfully');
    }

    public function room_delete($id)
    {
        $room_single = Room::where('id', $id)->first();

        unlink(public_path('uploads/' . $room_single->featured_photo));
        $room_single->delete();

        $room_gallery = RoomPhoto::where('room_id', $id)->get();
        foreach ($room_gallery as $item) {
            unlink(public_path('uploads/' . $item->photo));
            $item->delete();
        }

        return redirect()->route('admin_room_view')->with('success', 'Room Deleted Successfully');
    }


    // This part is a gallery of private pictures of the rooms


    public function room_gallery($id)
    {
        //dd($id);
        $room_data = Room::where('id', $id)->first();
        $room_gallery = RoomPhoto::where('room_id', $id)->get();
        return view('admin.room_gallery', compact('room_data', 'room_gallery'));
    }

    public function gallery_store(Request $request, $id)
    {

        // $room_gallery = RoomPhoto::where('room_id', $id)->first();
        $room_gallery = new RoomPhoto();

        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'room_gallery_' . $now . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $room_gallery->photo = $final_name;

        $room_gallery->room_id = $id;
        $room_gallery->save();

        return redirect()->route('admin_room_view')->with('success', 'Room Photo Gallery Saved Successfully');
    }

    public function gallery_delete($id)
    {
        $room_gallery_single = RoomPhoto::where('id', $id)->first();

        unlink(public_path('uploads/' . $room_gallery_single->photo));
        $room_gallery_single->delete();
        return redirect()->back()->with('success', 'Photo Gallery Deleted Successfully');
    }
}
