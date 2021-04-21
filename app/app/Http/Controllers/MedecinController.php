<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class MedecinController extends Controller {

    protected $medecin;

    public function __construct(Medecin $med) {
        $this->medecin = new Repository($med);
    }

    public function index() {
        return $this->medecin->all();
    }

    public function store(Request $request) {
        return $this->medecin->create($request->only($this->medecin->getModel()->fillable));
    }

    public function show($id) {
        return $this->medecin->show($id);
    }

    public function update(Request $request, $id) {

        return $this->medecin->update($request->only($this->medecin->getModel()->fillable), $id);

        //   return $this->medecin->find($id);
    }

    public function nomMedecin(Request $request) {
        return $this->medecin->nomMedecin(Medecin::query(), $request);
    }

    public function destroy($id) {
        return $this->medecin->delete($id);
    }

}
