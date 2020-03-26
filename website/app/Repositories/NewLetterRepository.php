<?php

namespace App\Repositories;

use App\Models\NewLetter;
use App\Repositories\BaseRepository;

/**
 * Class NewLetterRepository
 * @package App\Repositories
 * @version March 12, 2020, 5:44 pm UTC
*/

class NewLetterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email'
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
        return NewLetter::class;
    }
}
