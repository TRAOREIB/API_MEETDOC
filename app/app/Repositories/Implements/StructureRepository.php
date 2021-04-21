<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\structures;

class StructureRepository extends BaseRepository  implements StructureRepositoryInterface
{
    //
   //
   	protected $structures;
	public $table = "structures";
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return structures::class;
    }

	
	
 
    public function __construct(structures $structures)
    {
        $this->structures = $structures;
    }
 
    public function enregistrer($request)
    {
        $this->
        $this->structures->nom = $request->nom;
		$this->structures->telephone = $request->telephone;
        $this->structures->adresse = $request->adresse;
        $this->structures->save();
    }
    
    public function supprimer($request){
        
        $this->structures->destroy($request);
        
    }
    
    public function modifier(Array $inputs,$id){
        
         $this->structures=structures::find($id);
      //  $structures::find($id);
        $this->structures->update($inputs);
        
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
