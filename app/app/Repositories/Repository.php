<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface {

    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model) {
        $this->model = $model;
    }

    // Get all instances of model
    public function all() {
        return $this->model->all();
    }

    // create a new record in the database
    public function create(array $data) {
        if (isset($data["password"])) {
            $data["password"] = bcrypt($data["password"]);
            User::create($data);
        }
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id) {
        // echo "voila le id de patient ".$id; 
        if (isset($data["identifiant"])) {
            $data["password"] = bcrypt($data["password"]);
            User::where("identifiant", "=", $data["identifiant"])
                    ->update(['password' => $data["password"],
                        'email' => $data["email"],
                        'name' => $data["nom"]]);
        }
        $this->model->findOrFail($id)->update($data);
        //   return $this->model->update($data);
    }

    // remove record from the database
    public function delete($id) {
        $data = $this->model->findOrFail($id);
        if (isset($data["identifiant"])) {
            User::where("identifiant", "=", $data["identifiant"])
                    ->update(["actif", "=", FALSE]);
        }
        // return $this->model->destroy($id);
        $this->model->findOrFail($id)->update(["actif", "=", FALSE]);
    }

    // show the record with the given id
    public function show($id) {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel() {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model) {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations) {
        return $this->model->with($relations);
    }

    public function monindex($model, $request) {
        $status = $request->get('actif');

        if ($status) {
            // . Conditionally add a WHERE
            $model->where('actif', $status);
        }
        // Finish the query
        $results = $model->get();
        // return the response
        return response()->json($results);
    }
    
    public function monUser($model, $request) {
        $status = $request->get('identifiant');

        if ($status) {
            // . Conditionally add a WHERE
            $model->where('identifiant', $status);
        }
        // Finish the query
        $results = $model->get();
        // return the response
        return response()->json($results);
    }
    
     public function monPatient($model, $request) {
        $status = $request->get('identifiant');

        if ($status) {
            // . Conditionally add a WHERE
            $model->where('identifiant', $status);
        }
        // Finish the query
        $results = $model->get();
        // return the response
        return response()->json($results);
    }
    
    public function nomMedecin($model, $request) {
        $status = $request->get('identifiant');

        if ($status) {
            // . Conditionally add a WHERE
            $model->where('identifiant', $status);
        }
        // Finish the query
        $results = $model->get();
        // return the response
        return response()->json($results);
    }

}
