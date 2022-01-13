<?php

namespace App\Repositories;

use App\Models\ContentUs;
use App\Repositories\BaseRepository;

/**
 * Class ContentUsRepository
 * @package App\Repositories
 * @version August 31, 2020, 11:58 am UTC
*/

class ContentUsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'phone_number',
        'message'
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
        return ContentUs::class;
    }
}
