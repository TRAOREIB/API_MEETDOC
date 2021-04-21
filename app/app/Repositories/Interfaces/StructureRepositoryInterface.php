<?php

namespace App\Repositories;
use App\structures;

use Illuminate\Database\Eloquent\Model;

interface StructureRepositoryInterface 
{
    public function enregistrer($inputs);
    public function supprimer($inputs);
    public function modifier(Array $inputs,$id);
}
