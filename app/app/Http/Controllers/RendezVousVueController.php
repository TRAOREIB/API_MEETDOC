<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryVue;


class RendezVousVueController extends Controller
{
    
    protected $vuerendezvous;
    protected $vue="vuerendezvous";

    public function __construct() {
        $this->vuerendezvous = new RepositoryVue();
    }
    
    
    public function index()
    {
      return $this->vuerendezvous->allvue($this->vue);
    }

   
    public function show($id)
    {
         return $this->vuerendezvous->showvue($this->vue,$id);
    }
    
    public function consultation($id,$date)
    {
         return $this->vuerendezvous->consultationvue($this->vue,$id,$date);
    }
    
    public function consultationreprogramme($id){
        return $this->vuerendezvous->consultationreprogramme($this->vue, $id);
    }
    
    public function rendezvousdispo($idpatient,$iddispo){
        return $this->vuerendezvous->rendezvousdispo($this->vue, $idpatient,$iddispo);
    }
    
    public function rendezvouspatient($idrdv){
        return $this->vuerendezvous->rendezvouspatient($this->vue, $idrdv);
    }

}
