<?php

namespace App\Models\Portal;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_representacao
 * @property int $id_osc
 * @property int $id_usuario
 * @property Osc.tbOsc $osc.tbOsc
 * @property Portal.tbUsuario $portal.tbUsuario
 */
class Representacao extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'portal.tb_representacao';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_representacao';

    /**
     * @var array
     */
    protected $fillable = ['id_osc', 'id_usuario'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function osc.tbOsc()
    {
        return $this->belongsTo('App\Models\Portal\Osc.tbOsc', 'id_osc', 'id_osc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portal.tbUsuario()
    {
        return $this->belongsTo('App\Models\Portal\Portal.tbUsuario', 'id_usuario', 'id_usuario');
    }
}
