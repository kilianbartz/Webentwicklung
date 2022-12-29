<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model {


    public function getAufgaben($id = NULL) {
        $this->table = $this->db->table('aufgaben');
        $this->table->select('*');

        if ($id)
            $this->table->where('id', $id);

        $this->table->orderBy('name');
        $result = $this->table->get();

        if ($id)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function createAufgaben() {

        $this->table = $this->db->table('aufgaben');
        $this->table->insert(array(
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum' => $_POST['erstellungsdatum'],
            'faelligkeitsdatum' => $_POST['faelligkeitsdatum'],
            'reiterid' => $_POST['reiterid'],
            'ersteller' => $_SESSION['userid'],
            ));
    }

    public function updateAufgaben() {

        $this->table = $this->db->table('aufgaben');
        $this->table->where('id', $_POST['id']);
        $this->table->update(array(
            'beschreibung' => $_POST['beschreibung'],
            'erstellungsdatum' => $_POST['erstellungsdatum'],
            'faelligkeitsdatum' => $_POST['faelligkeitsdatum'],
            'reiterid' => $_POST['reiterid'],
            'ersteller' => $_SESSION['userid'],
        ));
    }

    public function deleteAufgaben() {
        $this->table = $this->db->table('aufgaben');
        $this->table->where('id', $_POST['id']);
        $this->table->delete();
    }

}

