<?php

use App\Models\Patient;

namespace App\Repositories;

/**
 * Description of Patient
 *
 * @author pc
 */
class Patient extends BaseRepository implements PatientInterface {

    protected $patient;
    public $table = "patient";

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Patient::class;
    }

    public function afficher($id) {
        $this->getById($id);
    }

    public function enregistrer($inputs) {
        $this->store($inputs);
    }

    public function modifier($id, array $inputs) {
        $this->update($id, $inputs);
    }

    public function supprimer($id) {
        $this->destroy($id);
        
    }

    public function index() {
        return Patient::all();
    }

}
