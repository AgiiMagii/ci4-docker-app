<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class RoomsModel extends Model
{
    protected $table = 'Rooms';
    protected $primaryKey = 'roomID';
    protected $useAutoIncrement = true;

    // Return type: array or entity
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    // Allowed fields
    protected $allowedFields = ['Name', 'Description', 'Capacity', 'Picture'];
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

    public function updateRoom($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteRoom($id)
    {
        $this->delete($id);
    }
}