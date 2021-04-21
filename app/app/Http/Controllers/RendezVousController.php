<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class RendezVousController extends Controller
{
    protected $rendezvous;

    public function __construct(RendezVous $rdv) {
        $this->rendezvous = new Repository($rdv);
    }

    public function index() {
        return $this->rendezvous->all();
    }

    public function store(Request $request) {

        // User::create($request->all());
        return $this->rendezvous->create($request->only($this->rendezvous->getModel()->fillable));
    }

    public function show($id) {
        return $this->rendezvous->show($id);
    }

    public function update(Request $request, $id) {

        return $this->rendezvous->update($request->only($this->rendezvous->getModel()->fillable), $id);

        //   return $this->rendezvous->find($id);
    }

    public function destroy($id) {
        return $this->rendezvous->delete($id);
    }

}
