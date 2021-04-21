<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $telephone
 * @property string $operateur
 * @property string $etat
 * @property string $created_at
 * @property string $updated_at
 * @property string $token
 * @property string $status
 * @property int $idpatient
 * @property boolean $actif
 */
class Transaction extends Model {

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'transaction';
    protected $dateFormat = 'Y-m-d H:i:sO';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'telephone', 'operateur', 'etat', 'created_at', 'updated_at', 'token', 'status', 'idpatient', 'actif'];

}
