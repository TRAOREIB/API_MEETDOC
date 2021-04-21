<?php

namespace App\Http\Controllers;

use App\Models\Strmedecin;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class StrmedecinController extends Controller
{
      protected $Strmedecin;

    public function __construct(Strmedecin $strmed) {
        $this->Strmedecin = new Repository($strmed);
    }
    
    
    public function index(Request $request)
    {
      return $this->Strmedecin->monindex(Strmedecin::query(),$request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return $this->Strmedecin->create($request->only($this->Strmedecin->getModel()->fillable));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Strmedecin  $examens
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return $this->Strmedecin->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Strmedecin  $examens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->Strmedecin->update($request->only($this->Strmedecin->getModel()->fillable), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Strmedecin  $examens
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->Strmedecin->delete($id);
    }
}
