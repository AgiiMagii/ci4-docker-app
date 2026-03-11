<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();

        if (!$this->session->get('logged_in') || $this->session->get('role') !== 'admin') {

            header('Location: /');
            exit;
        }
    }

    private function contents($view, $data = [])
    {
        $data['view'] = 'admin/' . $view;

        return view('admin/panel', $data);
    }

    public function getPanel()
    {
        return view('admin/panel');
    }

    public function getRooms()
    {
        $roomsModel = new \App\Models\RoomsModel();

        $data['rooms'] = $roomsModel->findAll();

        return $this->contents('rooms', $data);
    }

    public function getThemes()
    {
        $themesModel = new \App\Models\ThemesModel();

        $data['themes'] = $themesModel->findAll();

        return $this->contents('themes', $data);
    }

    public function getUsers()
    {
        $usersModel = new \App\Models\UsersModel();

        $data['users'] = $usersModel->findAll();

        return $this->contents('users', $data);
    }
}
