<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idlabo
 * @property integer $idstructure
 * @property string $nom
 * @property string $telephone
 * @property string $bp
 * @property string $email
 * @property string $heureouverture
 * @property string $heurefermeture
 * @property string $joursouvres
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
 * @property Structure $structure
 * @property Test[] $tests
 * @property Laboexam[] $laboexams
 */
class Laboratoires extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idlabo';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['idstructure', 'nom', 'telephone', 'bp', 'email', 'heureouverture', 'heurefermeture', 'joursouvres','actif', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo('App\Models\Structure', 'idstructure', 'idstructure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests()
    {
        return $this->hasMany('App\Models\Test', 'idlabo', 'idlabo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laboexams()
    {
        return $this->hasMany('App\Models\Laboexam', 'idlabo', 'idlabo');
    }
}
