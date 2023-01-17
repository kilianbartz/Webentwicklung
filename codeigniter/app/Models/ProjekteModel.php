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
    public function getAllProjekte(){
        $table = $this->db->table('projekte');
        $table->select('*');
        $result = $table->get();
        return $result->getResultArray();
    }
    public function getProject($id){
        $table = $this->db->table('projekte');
        $table->select('*');
        $table->where('id', $id);
        $result = $table->get();
        return $result->getRowArray();
    }
    public function createProjekt(){
        $this->table = $this->db->table('projekte');
        $this->table->insert(array(
            'name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'ersteller' => $_SESSION['userid']));
    }
    public function updateProjekt($id) {
        $this->table = $this->db->table('projekte');
        $this->table->where('id', $id);
        $update_arr = array(
            'name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung']);
        $this->table->update($update_arr);
    }

    public function deleteProjekt($id) {
        $this->table = $this->db->table('projekte');
        $this->table->where('id', $id);
        $this->table->delete();
    }

}

