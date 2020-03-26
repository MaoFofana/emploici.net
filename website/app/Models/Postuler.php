<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Postuler
 * @package App\Models
 * @version March 12, 2020, 5:44 pm UTC
 *
 * @property \App\Models\User user
 * @property string nom
 * @property string email
 * @property string lien
 * @property string cv
 * @property string lettre
 * @property integer user_id
 * @property string mot
 */
class Postuler extends Model
{
    use SoftDeletes;

    public $table = 'postulers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'email',
        'lien',
        'cv',
        'lettre',
        'user_id',
        'mots'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'email' => 'string',
        'lien' => 'string',
        'cv' => 'string',
        'lettre' => 'string',
        'user_id' => 'integer',
        'mots' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
