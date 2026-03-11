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

    public function postUpdate($id)
    {
        helper('filehelper'); // ielādē helperi

        $roomsModel = new \App\Models\RoomsModel();

        $data = [
            'Name' => $this->request->getPost('Name'),
            'Description' => $this->request->getPost('Description'),
            'Capacity' => $this->request->getPost('Capacity'),
        ];

        $image = \upload('Picture');
        if ($image) {
            $data['Picture'] = $image;
        }

        $roomsModel->update($id, $data);

        return redirect()->to('/admin/rooms');
    }

    public function postDelete($id)
    {
        $roomsModel = new \App\Models\RoomsModel();
        $roomsModel->deleteRoom($id);

        return redirect()->to('/admin/rooms');
    }
}
