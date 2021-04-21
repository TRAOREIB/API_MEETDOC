<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idmedecin
 * @property integer $idspecialite
 * @property string $nom
 * @property string $prenom
 * @property string $telephone
 * @property string $email
 * @property string $identifiant
 * @property string $password
 * @property string $titre
 * @property string $anexercice
 * @property string $titrehonorifique
 * @property string $pays
 * @property string $ville
 * @property string $exerce
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
 * @property Specialite $specialite
 * @property Disponibilite[] $disponibilites
 * @property Rendezvous[] $rendezvouses
 */
class Medecin extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'medecin';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idmedecin';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['idspecialite','identifiant','nom', 'prenom', 'telephone','pays','ville', 'email', 'titre', 'anexercice','actif', 'titrehonorifique','password', 'exerce','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialite()
    {
        return $this->belongsTo('App\Models\Specialite', 'idspecialite', 'idspecialite');
    }
    
    public function structure()
    {
        return $this->belongsTo('App\Models\Structure', 'idstructure', 'idstructure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disponibilites()
    {
        return $this->hasMany('App\Models\Disponibilite', 'idmedecin', 'idmedecin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezvouses()
    {
        return $this->hasMany('App\Models\Rendezvous', 'idmedecin', 'idmedecin');
    }
}
