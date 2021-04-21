<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idpatient
 * @property string $nom
 * @property string $prenom
 * @property string $telephone
 * @property int $age
 * @property string $sexe
 * @property string $cnib
 * @property string $identifiant
 * @property string $passeport
 * @property string $email
 * @property string $pays
 * @property string $ville
 * @property string $email_verified_at
 * @property string $password
 * @property boolean $actif
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Test[] $tests
 * @property Rendezvous[] $rendezvouses
 */
class Patient extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'patient';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idpatient';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'prenom','identifiant', 'telephone', 'age', 'sexe', 'cnib','pays','ville', 'passeport', 'email', 'email_verified_at', 'password','actif','remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests()
    {
        return $this->hasMany('App\Models\Test', 'idpatient', 'idpatient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezvouses()
    {
        return $this->hasMany('App\Models\Rendezvous', 'idpatient', 'idpatient');
    }
}
