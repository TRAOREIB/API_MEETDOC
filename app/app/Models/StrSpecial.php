<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idstructure
 * @property integer $idspecialite
 * @property boolean $actif
 * @property float $prix
 * @property string $created_at
 * @property string $updated_at
 * @property Structure $structure
 * @property Specialite $specialite
 */
class StrSpecial extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    
     protected $primaryKey = 'idstrspecial';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
    
    
    protected $table = 'strspecial';

    /**
     * @var array
     */
    protected $fillable = ['idstructure', 'idspecialite', 'idstrspecial','prix','actif','created_at', 'updated_at'];

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
    public function specialite()
    {
        return $this->belongsTo('App\Models\Specialite', 'idspecialite', 'idspecialite');
    }
}
