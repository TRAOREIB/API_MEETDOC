<?php

namespace App\Http\Controllers;

use App\Models\StrSpecial;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class StrSpecialController extends Controller {

    protected $strspecial;

    public function __construct(StrSpecial $strsp) {
        $this->strspecial = new Repository($strsp);
    }

    public function index() {
        return $this->strspecial->all();
    }

    public function store(Request $request) {
        return $this->strspecial->create($request->only($this->strspecial->getModel()->fillable));
    }

    public function show($id) {
        return $this->strspecial->show($id);
    }

    public function update(Request $request, $id) {

        return $this->strspecial->update($request->only($this->strspecial->getModel()->fillable), $id);

        //   return $this->strspecial->find($id);
    }

    public function destroy($id) {
        return $this->strspecial->delete($id);
    }

}
