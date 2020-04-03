<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 * @package App\Models
 * @version March 12, 2020, 5:44 pm UTC
 *
 * @property string message
 *@property string email
 * @property  string nom
 * @property  integer to
 * @property  integer from
 * @property  boolean lu
 * @property  integer id
 */
class Message extends Model
{
    use SoftDeletes;

    public $table = 'messages';
    protected $dates = ['deleted_at'];



    public $fillable = [
        'message',
        'to',
        'from',
        'email',
        'nom',
        'lu',
        'id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'message' => 'string',
        'to' => 'integer',
        'from'=> 'integer',
        'email'=>'string',
        'nom'=>'string',
        'lu'=>'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'lu'];

}
