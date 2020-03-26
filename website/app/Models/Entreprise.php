<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Entreprise
 * @package App\Models
 * @version March 12, 2020, 5:40 pm UTC
 *
 * @property string nom
 * @property string registrecommerce
 * @property integer contact
 * @property string localisation
 * @property string infoentrepriseactivite
 */
class Entreprise extends Model
{
    use SoftDeletes;

    public $table = 'entreprises';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'registrecommerce',
        'contact',
        'localisation',
        'infoentrepriseactivite'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'registrecommerce' => 'string',
        'contact' => 'integer',
        'localisation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'infoentrepriseactivite' => 'required'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
