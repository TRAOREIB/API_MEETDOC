<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;
use Illuminate\Http\Request;

class MedecinVueController extends Controller
{
    //
     protected $vuemedecin;
    protected $vue="vuemedecin";

    public function __construct() {
        $this->vuemedecin = new RepositoryVue();
    }
    
    
    public function index()
    {
      return $this->vuemedecin->allvue($this->vue);
    }

   
    public function show($id)
    {
         return $this->vuemedecin->showvue($this->vue,$id);
    }
}
