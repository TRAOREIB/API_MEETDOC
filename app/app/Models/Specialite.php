<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idspecialite
 * @property string $libelle
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
 * @property Strspecial[] $strspecials
 * @property Medecin[] $medecins
 */
class Specialite extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'specialite';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idspecialite';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['libelle','actif', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function strspecials()
    {
        return $this->hasMany('App\Models\Strspecial', 'idspecialite', 'idspecialite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medecins()
    {
        return $this->hasMany('App\Models\Medecin', 'idspecialite', 'idspecialite');
    }
}
