<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class RepositoryVue implements RepositoryVueInterface {

    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct() {
        
    }
  
    
    public function allvue($vue){
        return DB::table("$vue")->where("actif","=","true")->get();
    }

  
    public function showvue($vue,$id){
       return DB::table("$vue")->where("id","=",$id)->where("actif","=","true")->get();
    }
     
     public function consultationvue($vue,$id,$date){
       return DB::table("$vue")->where("idmedecin","=",$id)->where("jourrendezvous","=","$date")->where("actif","=","true")->get();
    }

    public function examenvue($vue,$id,$date){
       return DB::table("$vue")->where("idlabo","=",$id)->where("jourtest","=","$date")->get();
    }
    
    public function consultationreprogramme($vue,$id){
        return DB::table("$vue")->where("idmedecin","=",$id)->where("reprogramme","=",true)->where("actif","=","true")->get();
        
    }
    
    public function rendezvousdispo($vue,$idpatient,$iddispo){
          return DB::table("$vue")->where("id","=",$idpatient)->where("iddisponibilite","=",$iddispo)->where("actif","=","true")->get();
    }
    
    public function testdispo($vue,$idpatient,$idtest){
         return DB::table("$vue")->where("id","=",$idpatient)->where("idtest","=",$idtest)->where("actif","=","true")->get();
    }
  
    public function rendezvouspatient($vue,$idrdv){
        return DB::table("$vue")->where("idrdv","=",$idrdv)->where("actif","=","true")->get();
    }
    
    public function affectationmedecin($vue,$idmedecin){
         return DB::table("$vue")->where("idmedecin","=",$idmedecin)->get();
    }

}
