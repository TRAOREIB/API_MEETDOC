<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class SpecialiteController extends Controller {

    protected $specialite;

    public function __construct(Specialite $spe) {
        $this->specialite = new Repository($spe);
    }

    public function index() {
        return $this->specialite->all();
    }

    public function store(Request $request) {
        return $this->specialite->create($request->only($this->specialite->getModel()->fillable));
    }

    public function show($id) {
        return $this->specialite->show($id);
    }

    public function update(Request $request, $id) {

        return $this->specialite->update($request->only($this->specialite->getModel()->fillable), $id);

        //   return $this->specialite->find($id);
    }

    public function destroy($id) {
        return $this->specialite->delete($id);
    }

}
