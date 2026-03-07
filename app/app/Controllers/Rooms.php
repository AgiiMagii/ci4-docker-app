<?php

namespace App\Controllers;

class Rooms extends BaseController
{
    public function getList()
    {
        $roomsModel = new \App\Models\RoomsModel();
        $data = $roomsModel->getAllRooms();
        return view('rooms/list', ['rooms' => $data]);
    }
}