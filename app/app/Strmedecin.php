<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idmedecin
 * @property int $idstructure
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $actif
 * @property Medecin $medecin
 * @property Structure $structure
 */
class Strmedecin extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'strmedecin';

    /**
     * @var array
     */
    protected $fillable = ['idmedecin', 'idstructure', 'created_at', 'updated_at', 'actif'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medecin()
    {
        return $this->belongsTo('App\Medecin', 'idmedecin', 'idmedecin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo('App\Structure', 'idstructure', 'idstructure');
    }
}
