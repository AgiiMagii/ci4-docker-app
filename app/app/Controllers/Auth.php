<?php

namespace App\Controllers;

use PSpell\Config;

class Auth extends BaseController
{
    public function getLogin()
    {
        return view('auth/login');
    }

    public function getRegister()
    {
        return view('auth/register');
    }

    public function postLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usersModel = new \App\Models\UsersModel();
        $user = $usersModel->login($email, $password);

        if ($user) {
            // Sesija jau iestatīta UserModel login() metodē
            return redirect()->to('/')->with('success', 'Veiksmīgi pieteicies');
        }

        return redirect()->back()->with('error', 'Nepareizs e-pasts vai parole');
    }

    // logout
    public function getLogout()
    {
        $usersModel = new \App\Models\UsersModel();
        $usersModel->logout();

        return redirect()->to('/')->with('success', 'Veiksmīgi izrakstījies');
    }

    public function postRegister()
    {
        $firstName = $this->request->getPost('Name');
        $lastName = $this->request->getPost('Surname');
        $email = $this->request->getPost('Email');
        $phone = $this->request->getPost('Phone');
        $password = $this->request->getPost('Password');
        $confirmPassword = $this->request->getPost('confirmPassword');

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Paroles nesakrīt');
        }

        $usersModel = new \App\Models\UsersModel();
        if ($usersModel->register($firstName, $lastName, $email, $phone, $password)) {
            return redirect()->to('/auth/login')->with('success', 'Reģistrācija veiksmīga, lūdzu piesakieties');
        }

        return redirect()->back()->with('error', 'Reģistrācija neizdevās');
    }

    public function getProfile()
    {
        $session = session();
        $userId = $session->get('userID');
        if (! $userId) {
            return redirect()->to('/auth/login');
        }
        $usersModel = new \App\Models\UsersModel();
        $user = $usersModel->getUserById($userId);
        return view('auth/profile', ['user' => $user]);
    }

    public function postUpdate()
    {
        $session = session();
        $userId = $session->get('userID');

        $name = $this->request->getPost('Name');
        $surname = $this->request->getPost('Surname');
        $email = $this->request->getPost('Email');
        $phone = $this->request->getPost('Phone');

        $usersModel = new \App\Models\UsersModel();
        $usersModel->update($userId, [
            'Name' => $name,
            'Surname' => $surname,
            'Email' => $email,
            'Phone' => $phone
        ]);

        // Atjaunojam sesijas datus
        $session->set([
            'fullName' => $name . ' ' . $surname,
            'email' => $email,
        ]);

        return redirect()->back()->with('success', 'Profils atjaunināts');
    }

    public function postDelete()
    {
        $session = session();
        $userId = $session->get('userID');

        $usersModel = new \App\Models\UsersModel();
        $usersModel->deleteProfile($userId);
        $usersModel->logout();

        return redirect()->to('/')->with('success', 'Profils dzēsts');
    }
}
