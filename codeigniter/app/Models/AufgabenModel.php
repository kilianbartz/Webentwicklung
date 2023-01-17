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
    public function getAufgabenMitMitgliedern() {
        $result = $this->db->table('aufgaben')
            ->select("aufgaben.*, reiter.name as rname, group_concat(mitglieder.username SEPARATOR ', ') as zustaendige")
        ->join('mitgliederaufgaben', 'aufgaben.id = mitgliederaufgaben.aufgabenid')
        ->join('mitglieder', 'mitglieder.id = mitgliederaufgaben.mitgliederid')
        ->join('reiter', 'aufgaben.reiterid = reiter.id')
            ->orderBy('reiterid')
            ->groupBy('aufgaben.id')->get();


            return $result->getResultArray();
    }
    public function getAufgabeMitMitgliedern($id) {
        $result = $this->db->table('aufgaben')
            ->select("aufgaben.*, reiter.name as rname, group_concat(mitglieder.username SEPARATOR ', ') as zustaendige")
        ->join('mitgliederaufgaben', 'aufgaben.id = mitgliederaufgaben.aufgabenid')
        ->join('mitglieder', 'mitglieder.id = mitgliederaufgaben.mitgliederid')
            ->where('aufgaben.id', $id)
        ->join('reiter', 'aufgaben.reiterid = reiter.id')
            ->groupBy('aufgaben.id')->get();
        return $result->getRowArray();
    }


    public function createAufgabe() {
        $this->table = $this->db->table('aufgaben');
        $this->table->insert(array(
            'name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'faelligkeitsdatum' => $_POST['faelligkeitsdatum'],
            'reiterid' => $_POST['reiterid'],
            'ersteller' => $_SESSION['userid'],
            ));
        $id = $this->db->insertID();
        $table = $this->db->table("mitgliederaufgaben");
        $data = [];
        foreach($_POST['zust'] as $mitgliederid){
            array_push($data, ['mitgliederid' => $mitgliederid, 'aufgabenid' => $id]);
        }
        $table->insertBatch($data);
    }

    public function updateAufgabe($id) {

        $this->table = $this->db->table('aufgaben');
        $this->table->where('id', $id);
        $this->table->update(array(
            'name' => $_POST['name'],
            'beschreibung' => $_POST['beschreibung'],
            'faelligkeitsdatum' => $_POST['faelligkeitsdatum'],
            'reiterid' => $_POST['reiterid'],
        ));
        $table = $this->db->table("mitgliederaufgaben");
        $table->where('aufgabenid', $id);
        $table->delete();
        $data = [];
        foreach($_POST['zust'] as $mitgliederid){
            array_push($data, ['mitgliederid' => $mitgliederid, 'aufgabenid' => $id]);
        }
        $table->insertBatch($data);
    }

    public function deleteAufgabe($id) {
        $this->table = $this->db->table('aufgaben');
        $this->table->where('id', $id);
        $this->table->delete();
    }


}

