<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;


class TestVueController extends Controller
{
    
    protected $vuetest;
    protected $vue="vuetest";

    public function __construct() {
        $this->vuetest = new RepositoryVue();
    }
    
    
    public function index()
    {
        return $this->vuetest->allvue($this->vue);
        //return $this->vuetest->showvue($this->vue,$id);
    }

   
    public function show($id)
    {
         return $this->vuetest->showvue($this->vue,$id);
    }

    public function examen($id,$date)
    {
         return $this->vuetest->examenvue($this->vue,$id,$date);
    }
    
    public function testdispo($idpatient,$idtest){
        return $this->vuetest->testdispo($this->vue, $idpatient, $idtest);
    }
}
