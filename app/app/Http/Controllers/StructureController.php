<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class StructureController extends Controller {

    protected $structure;

    public function __construct(Structure $str) {
        $this->structure = new Repository($str);
    }

    public function index() {
        return $this->structure->all();
    }

    public function store(Request $request) {
        return $this->structure->create($request->only($this->structure->getModel()->fillable));
    }

    public function show($id) {
        return $this->structure->show($id);
    }

    public function update(Request $request, $id) {

        return $this->structure->update($request->only($this->structure->getModel()->fillable), $id);

        //   return $this->structure->find($id);
    }

    public function destroy($id) {
        return $this->structure->delete($id);
    }

}
