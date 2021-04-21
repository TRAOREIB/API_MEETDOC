<?php

namespace App\Repositories;

/**
 *
 * @author TRAORE Ibrahim
 */
interface PatientInterface {

    public function index();

    public function enregistrer($inputs);

    public function supprimer($id);

    public function modifier($id, Array $inputs);

    public function afficher($id);
}
