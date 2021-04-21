<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $nom
 * @property string $prenom
 */
class Essai extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
   protected $table = 'Essai';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
  //  protected $primaryKey = 'idtest';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
  //  protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'prenom'];
}
