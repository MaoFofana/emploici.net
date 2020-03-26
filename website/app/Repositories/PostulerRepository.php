<?php

namespace App\Repositories;

use App\Models\Postuler;
use App\Repositories\BaseRepository;

/**
 * Class PostulerRepository
 * @package App\Repositories
 * @version March 12, 2020, 5:44 pm UTC
*/

class PostulerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'email',
        'lien',
        'cv',
        'lettre',
        'mots',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Postuler::class;
    }
}
