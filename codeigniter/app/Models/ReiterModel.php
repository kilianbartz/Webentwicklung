<?php namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model {


    public function getReiter($id = NULL) {
        $this->table = $this->db->table('reiter');
        $this->table->select('*');

        if ($id)
            $this->table->where('id', $id);

        $result = $this->table->get();

        if ($id)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createReiter() {

        $this->table = $this->db->table('reiter');
        $this->table->insert(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function updateReiter() {

        $this->table = $this->db->table('reiter');
        $this->table->where('id', $_POST['id']);
        $this->table->update(array('name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']));
    }

    public function deleteReiter() {
        $this->table = $this->db->table('reiter');
        $this->table->where('id', $_POST['id']);
        $this->table->delete();
    }

}

