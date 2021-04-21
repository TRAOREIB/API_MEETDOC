<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $idtest
 * @property integer $idexamen
 * @property integer $idlabo
 * @property integer $idpatient
 * @property string $jour
 * @property boolean $paye
 * @property boolean $reprogramme
 * @property boolean $actif
 * @property boolean $effectue
 * @property int $ordrepassage
 * @property string $created_at
 * @property string $updated_at
 * @property Laboratoire $laboratoire
 * @property Patient $patient
 * 
 */
class Test extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'test';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtest';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['idlabo', 'idpatient','idexamen', 'jour','paye', 'reprogramme', 'ordrepassage','actif','effectue', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratoire()
    {
        return $this->belongsTo('App\Models\Laboratoire', 'idlabo', 'idlabo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient', 'idpatient', 'idpatient');
    }
}
