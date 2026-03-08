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

    public function getSearch()
    {
        $criteria = [
            'startDate' => $this->request->getGet('startDate'),
            'endDate' => $this->request->getGet('endDate'),
            'Capacity' => $this->request->getGet('Capacity'),
        ];

        $roomsModel = new \App\Models\RoomsModel();
        $data = $roomsModel->findFromSearch($criteria);

        return view('rooms/list', ['criteria' => $criteria, 'rooms' => $data]);
    }
}
