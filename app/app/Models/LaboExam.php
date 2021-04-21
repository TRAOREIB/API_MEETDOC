<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idexamen
 * @property integer $idlabo
 * @property float $prix
 * @property string $joursexam
 * @property string $condiremplir
 * @property float $heuredebut
 * @property float $heurefin
 * @property boolean $actif
 * @property string $created_at
 * @property string $updated_at
 * @property Examen $examen
 * @property Laboratoire $laboratoire
 */
class LaboExam extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'laboexam';

     protected $primaryKey = 'idlaboexam';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $fillable = ['idexamen','idlaboexam','heuredebut','heurefin', 'idlabo','actif', 'prix','joursexam','condiremplir','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examen()
    {
        return $this->belongsTo('App\Models\Examen', 'idexamen', 'idexamen');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratoire()
    {
        return $this->belongsTo('App\Models\Laboratoire', 'idlabo', 'idlabo');
    }
}
