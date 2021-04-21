<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class PatientController extends Controller {

    protected $patient;

    public function __construct(Patient $pat) {
        $this->patient = new Repository($pat);
    }

    public function index(Request $request) {
      //  return $this->patient->all();
        return $this->patient->monindex(Patient::query(),$request);
    }
    
    public function monPatient(Request $request){
        return $this->patient->monPatient(Patient::query(), $request);
    }

    public function store(Request $request) {

        // User::create($request->all());
        return $this->patient->create($request->only($this->patient->getModel()->fillable));
    }

    public function show($id) {
        return $this->patient->show($id);
    }

    public function update(Request $request, $id) {

        return $this->patient->update($request->only($this->patient->getModel()->fillable), $id);

        //   return $this->patient->find($id);
    }

    public function destroy($id) {
        return $this->patient->delete($id);
    }

}
