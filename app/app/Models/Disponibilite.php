<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $iddisponibilite
 * @property integer $idstructure
 * @property integer $idmedecin
 * @property string $jour
 * @property string $heuredebut
 * @property string $heurefin
 * @property int $nbrconsultation
 * @property int $placerestant
 * @property boolean $actif
 * @property integer $rang
 * @property string $created_at
 * @property string $updated_at
 * @property Structure $structure
 * @property Medecin $medecin
 */
class Disponibilite extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'disponibilite';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddisponibilite';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['idstructure', 'idmedecin', 'jour', 'heuredebut', 'heurefin', 'nbrconsultation','placerestant','actif','rang', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo('App\Models\Structure', 'idstructure', 'idstructure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medecin()
    {
        return $this->belongsTo('App\Models\Medecin', 'idmedecin', 'idmedecin');
    }
}
