<?php namespace App\Models;

use CodeIgniter\Model;

class ProjekteModel extends Model {


    public function getFirstProjekt() {
        $this->table = $this->db->table('projekte');
        $this->table->select('*');
        $this->table->orderBy('id', 'desc');
        $this->table->limit(1);
        $result = $this->table->get();
        return $result->getRowArray();
    }

}

