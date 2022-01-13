<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\BaseRepository;

/**
 * Class RoleRepository
 * @package App\Repositories
 * @version September 13, 2020, 12:00 pm UTC
*/

class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Role::class;
    }

    /**
     * Create the Model
     */
    public function create($input){
        $role = $this->model;
        $role->fill($input)->save();

        if(isset($input['permissions'])){
            $role->permissions()->syncWithoutDetaching($input['permissions']);
        }

        return $role;
        
    }

    /**
     * Update the Model
     */
    public function update($input, $id){
        $role = $this->model->findorFail($id);
        $role->fill($input)->save();

        if(isset($input['permissions'])){
            $role->permissions()->sync($input['permissions']);
        }

        return $role;
    }
}
