<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    function create(Request $request, Room $room){
        $room->user_id = 2;
        $room->valid_from = $request->valid_from;
        $room->valid_to = $request->valid_to;
        $room->save();
        return $this->successResponse('saved', $room);
        // $id = $request->user_id;
    }

    function delete(Request $request){
        $room = Room::find($request->id);
        if ($room->exist()){
            //valid from to
            if ($room->whereBetween()){
                $room->delete();
                
            }
        }
    }

    function get(Request $request){
        $rooms = Room::all();
        return $this->successResponse('', $rooms);

    }

}
