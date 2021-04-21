<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;


class StrMedecinvueController extends Controller
{
      protected $vuemedecinstructure;
    protected $vue="vuemedecinstructure";

    public function __construct() {
        $this->vuemedecinstructure = new RepositoryVue();
    }
    
    
    public function index()
    {
      return $this->vuemedecinstructure->allvue($this->vue);
    }

   
    public function show($id)
    {
         return $this->vuemedecinstructure->showvue($this->vue,$id);
    }

    public function affectation($id){
        return $this->vuemedecinstructure->affectationmedecin($this->vue, $id);
    }
}
