<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;


class DisponibiliteVueController extends Controller
{
    
    protected $vuedispo;
    protected $vue="vuedispo";

    public function __construct() {
        $this->vuedispo = new RepositoryVue();
    }
    
    
    public function index()
    {
      return $this->vuedispo->showvue($this->vue,$id);
    }

   
    public function show($id)
    {
         return $this->vuedispo->showvue($this->vue,$id);
    }
    
    public function allvue(){       
          return $this->vuedispo->allvue($this->vue);
    }

}
