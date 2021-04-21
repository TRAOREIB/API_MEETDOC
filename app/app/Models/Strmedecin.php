<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $idmedecin
 * @property int $idstructure
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
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
    protected $dateFormat = 'Y-m-d H:i:sO';
    
    protected $table = 'strmedecin';
    
     /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['idmedecin', 'idstructure','actif', 'created_at', 'updated_at'];

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
