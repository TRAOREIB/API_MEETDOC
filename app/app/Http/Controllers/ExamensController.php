<?php

namespace App\Http\Controllers;

use App\Models\Examens;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class ExamensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $Examens;

    public function __construct(Examens $exam) {
        $this->Examens = new Repository($exam);
    }
    
    
    public function index(Request $request)
    {
      return $this->Examens->monindex(Examens::query(),$request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return $this->Examens->create($request->only($this->Examens->getModel()->fillable));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return $this->Examens->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->Examens->update($request->only($this->Examens->getModel()->fillable), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Examens  $examens
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->Examens->delete($id);
    }
}
