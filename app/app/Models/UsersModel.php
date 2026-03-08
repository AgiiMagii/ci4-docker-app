<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class UsersModel extends Model
{
    protected $table            = 'Users';
    protected $primaryKey       = 'userID';
    protected $useAutoIncrement = true;

    // Return type: array or entity
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Allowed fields
    protected $allowedFields    = [
        'Name',
        'Surname',
        'Email',
        'Phone',
        'Password',
        'Role'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    public function login($email, $password)
    {
        $user = $this->where('Email', $email)->first();

        if ($user && $password === $user['Password']) {
            $session = \Config\Services::session();
            $session->set([
                'userID'    => $user['userID'],
                'fullName'  => $user['Name'] . ' ' . $user['Surname'],
                'email'     => $user['Email'],
                'role'      => $user['Role'],
                'logged_in' => true
            ]);
            return true;
        }

        return false;
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
    }

    public function register($firstName, $lastName, $email, $phone, $password)
    {
        $data = [
            'Name' => $firstName,
            'Surname' => $lastName,
            'Email' => $email,
            'Phone' => $phone,
            'Password' => $password,
            'Role' => 'customer'
        ];

        return $this->insert($data);
    }

    public function getUserById($userId)
    {
        return $this->where('userID', $userId)->first();
    }

    public function updateProfile($userId, $data)
    {
        return $this->update($userId, $data);
    }

    public function deleteProfile($userId)
    {
        return $this->delete($userId);
    }
}
