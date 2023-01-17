<?php namespace App\Models;

use CodeIgniter\Model;

class MitgliederModel extends Model {


    public function getMitglieder($id = NULL) {
        $this->table = $this->db->table('mitglieder');
        $this->table->select('*');

        if ($id)
            $this->table->where('id', $id);

        $this->table->orderBy('username');
        $result = $this->table->get();

        if ($id)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }
    public function getMitgliederByEmail($email) {
        $this->table = $this->db->table('mitglieder');
        $this->table->select('*');
            $this->table->where('email', $email);
        $result = $this->table->get();
            return $result->getRowArray();
    }

    public function createMitglied() {

        $this->table = $this->db->table('mitglieder');
        $this->table->insert(array(
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)));
    }

    public function updatePerson($id) {

        $this->table = $this->db->table('mitglieder');
        $this->table->where('id', $id);
        $update_arr = array(
            'username' => $_POST['username'],
            'email' => $_POST['email']);
        if($_POST['password'] && !empty($_POST['password'])) $update_arr['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->table->update($update_arr);
    }

    public function deletePerson($id) {
        $this->table = $this->db->table('mitglieder');
        $this->table->where('id', $id);
        $this->table->delete();
    }
    public function getUserProject($id){
        $this->table = $this->db->table("projektemitglieder");
        $this->table->where('mitgliederid', $id);
        $this->table->select("projektid");
        $result = $this->table->get(1);
        return $result->getRowArray();
    }

}

