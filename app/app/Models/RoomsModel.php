<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class RoomsModel extends Model
{
    protected $table = 'Rooms';
    protected $primaryKey = 'roomID';
    protected $allowedFields = ['Name', 'Description', 'Capacity'];

    public function getAllRooms()
    {
        $data = $this->db ->table('Rooms')
            ->get()
            ->getResultArray();
        return $data;
    }
}