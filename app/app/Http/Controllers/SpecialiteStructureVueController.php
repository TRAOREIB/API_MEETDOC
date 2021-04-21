<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;


class SpecialiteStructureVueController extends Controller
{
    
    protected $vuespecialitestructure;
    protected $vue="vuespecialitestructure";

    public function __construct() {
        $this->vuespecialitestructure = new RepositoryVue();
    }
    
    
    public function index()
    {
      return $this->vuespecialitestructure->allvue($this->vue);
    }

   
    public function show($id)
    {
         return $this->vuespecialitestructure->showvue($this->vue,$id);
    }

}
