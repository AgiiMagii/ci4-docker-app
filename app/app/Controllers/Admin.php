<?php

namespace App\Controllers;

class Admin extends BaseController
{
    private function checkAdmin()
    {
        $session = \Config\Services::session();
        if (!$session->get('logged_in') || $session->get('role') !== 'admin') {
            return false;
        }
        return true;
    }

    public function getPanel()
    {
        if (!$this->checkAdmin()) {
            return redirect()->to('/')->with('error', 'Jums nav piekļuves šai sadaļai');
        }

        return view('admin/panel');
    }
}