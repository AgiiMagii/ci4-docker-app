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

    public function findFromSearch(array $criteria = []): array
    {
        $builder = $this->db->table('Rooms');
        if (!empty($criteria['startDate']) && !empty($criteria['endDate'])) {
            $builder->where('startDate >=', $criteria['startDate'])
                    ->where('endDate <=', $criteria['endDate']);
        }
        if (!empty($criteria['Capacity'])) {
            $builder->where('Capacity >=', $criteria['Capacity']);
        }
        return $builder->get()->getResultArray();
    }
}