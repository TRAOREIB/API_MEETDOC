<?php

namespace App\Http\Controllers;

use App\Models\Disponibilite;
use Illuminate\Http\Request;
use App\Repositories\Repository;


class DisponibiliteController extends Controller
{
     protected $disponibilite;
    
      public function __construct(Disponibilite $dispo) {
        $this->disponibilite = new Repository($dispo);
    }
     
    public function index()
    {
        return $this->disponibilite->all();
    }

  
    public function store(Request $request)
    {
        return $this->disponibilite->create($request->only($this->disponibilite->getModel()->fillable));
    }
 public function show($id) {
        return $this->disponibilite->show($id);
    }

    public function update(Request $request, $id) {

        return $this->disponibilite->update($request->only($this->disponibilite->getModel()->fillable), $id);

        //   return $this->disponibilite->find($id);
    }

    public function destroy($id) {
        return $this->disponibilite->delete($id);
    }
}
