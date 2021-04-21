<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;


class LaboExamVueController extends Controller
{
    
    protected $vuelaboexam;
    protected $vue="vueexamen";

    public function __construct() {
        $this->vuelaboexam = new RepositoryVue();
    }
    
    
    public function index()
    {
      return $this->vuelaboexam->allvue($this->vue);
    }

   
    public function show($id)
    {
         return $this->vuelaboexam->showvue($this->vue,$id);
    }

}
