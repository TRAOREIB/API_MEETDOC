<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmedecin
 * @property integer $iddisponibilite
 * @property integer $idpatient
 * @property integer $rang
 * @property string $jour
 * @property boolean $effectue
 * @property boolean $reprogramme
 * @property boolean $paye
 * @property boolean $effectue
 * @property string $symptomes
 * @property string $antecedants
 * @property string $examensfait
 * @property int $ordrepassage
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
 * @property Medecin $medecin
 * @property Patient $patient
 * @property string $heuredebut
 * @property string $heurefin
 * @property float $prix
 */
class Rendezvous extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    
  
    
    protected $table = 'rendezvous';
    
    protected $primaryKey = 'idrdv';

    /**
     * @var array
     */
    protected $fillable = ['idrdv','idmedecin','iddisponibilite', 'idpatient', 'jour','effectue', 'reprogramme','actif', 'paye', 'symptomes','rang', 'antecedants', 'examensfait', 'ordrepassage','effectue', 'created_at', 'updated_at','heuredebut','heurefin','prix'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medecin()
    {
        return $this->belongsTo('App\Models\Medecin', 'idmedecin', 'idmedecin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient', 'idpatient', 'idpatient');
    }
}
