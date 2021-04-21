<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idstructure
 * @property int $idstructparent
 * @property string $responsable
 * @property string $nom
 * @property string $telephone
 * @property string $bp
 * @property string $email
 * @property string $fax
 * @property string $siteweb
 * @property string $pays
 * @property string $ville
 * @property string $rue
 * @property string $specialite
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
 * @property Structure $structure
 * @property Strspecial[] $strspecials
 * @property Disponibilite[] $disponibilites
 * @property Laboratoire[] $laboratoires
 */
class Structure extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'structure';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idstructure';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['idstructparent', 'responsable', 'nom', 'telephone', 'bp','pays','ville','actif','rue', 'email', 'fax', 'siteweb', 'specialite', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo('App\Models\Structure', 'idstructparent', 'idstructure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function strspecials()
    {
        return $this->hasMany('App\Models\Strspecial', 'idstructure', 'idstructure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disponibilites()
    {
        return $this->hasMany('App\Models\Disponibilite', 'idstructure', 'idstructure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laboratoires()
    {
        return $this->hasMany('App\Models\Laboratoire', 'idstructure', 'idstructure');
    }
}
