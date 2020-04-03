<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Job
 * @package App\Models
 * @version March 12, 2020, 5:43 pm UTC
 *
 * @property string titre
 * @property string typeoffre
 * @property string secteuractivite
 * @property string niveauetude
 * @property string lieu
 * @property string datelimite
 * @property string description
 * @property integer nombreposte
 */
class Job extends Model
{
    use SoftDeletes;

    public $table = 'jobs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'titre',
        'typeoffre',
        'secteuractivite',
        'niveauetude',
        'lieu',
        'datelimite',
        'description',
        'nombreposte'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titre' => 'string',
        'typeoffre' => 'string',
        'secteuractivite' => 'string',
        'niveauetude' => 'string',
        'lieu' => 'string',
        'description' => 'string',
        'datelimite' => 'date',
        'nombreposte' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postuler(){
        return $this->hasMany(Postuler::class);
    }

}
