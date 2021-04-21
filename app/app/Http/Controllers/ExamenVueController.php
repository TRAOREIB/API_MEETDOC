<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;


class ExamenVueController extends Controller
{
    
    protected $vueexamen;
    protected $vue="vueexamen";

    public function __construct() {
        $this->vueexamen = new RepositoryVue();
    }
    
    
    public function index()
    {
      return $this->vueexamen->allvue($this->vue);
    }

   
    public function show($id)
    {
         return $this->vueexamen->showvue($this->vue,$id);
    }

}
