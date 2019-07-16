<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    //
    public function index_rooms()
    {
        $image_array = [];
        $rooms = Room::all()->toArray();
        foreach ($rooms as $key => $value) {
            $image = Image::where('rooms_id', $value['id'])->first();
            $image_array[$key] = $value;
            $image_array[$key]['images'] = $image;
        }

        return view('admin.rooms.index_rooms', compact('rooms', 'image_array'));
    }

    //ADD Rooms
    public function create()
    {
        return view('admin.rooms.add');
    }

    public function add(Request $request)
    {
        $new_room = new Room();

        $new_room->name = $request->get('name');
        $new_room->title = $request->get('title');
        $new_room->rooms_detail = $request->get('rooms_detail');
        $new_room->price = $request->get('price');
        $new_room->address = $request->get('address');
        $new_room->bed_type = $request->get('bed_type');

        // upload_image
        $images_File = $request->file('images');
        if ($new_room->save()) {
            foreach ($images_File as $image_Files) {
                $new_image = new Image();
                $FileName = $image_Files->getClientOriginalName();
                $image_Files->move('upload_image/', $FileName);
                $new_image->images = $FileName;
                $new_image->rooms_id = $new_room->id;
                $new_image->save();
            }
        }

        return redirect()->route('index_rooms', compact('new_room'));
    }

    //EDIT ROOMS
    public function update($id)
    {
        $rooms = Room::find($id);
        if (empty($rooms)) {
            return redirect('admin/rooms');
        }

        return view('admin.rooms.edit', compact('rooms'));
    }

    public function edit(Request $request, $id)
    {
        $new_room = Room::find($id);
        if (empty($new_room)) {
            return redirect('admin/rooms');
        } else {
            $new_room->name = $request->get('name');
            $new_room->title = $request->get('title');
            $new_room->rooms_detail = $request->get('rooms_detail');
            $new_room->price = $request->get('price');
            $new_room->address = $request->get('address');
            $new_room->bed_type = $request->get('bed_type');

            // upload_image
            $images_File = $request->file('images');
            if ($new_room->save()) {
                foreach ($images_File as $image_Files) {
                    $new_image = new Image();
                    $FileName = $image_Files->getClientOriginalName();
                    $image_Files->move('upload_image/', $FileName);
                    $new_image->images = $FileName;
                    $new_image->rooms_id = $new_room->id;
                    $new_image->save();
                }
            }
        }

        return redirect()->route('index_rooms', compact('new_room'));
    }

    public function remove($id)
    {

    }
}
