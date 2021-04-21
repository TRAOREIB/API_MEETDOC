<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idexamen
 * @property string $libelle
 * @property string $type
 * @property string $condiremplir
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
 * @property Laboexam[] $laboexams
 */
class Examens extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idexamen';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['libelle', 'type','actif','condiremplir', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laboexams()
    {
        return $this->hasMany('App\Models\Laboexam', 'idexamen', 'idexamen');
    }
}
