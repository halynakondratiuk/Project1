<?php
/**
 * Created by PhpStorm.
 * User: halyna
 * Date: 21.07.16
 * Time: 8:29
 */

namespace App\Repositories;

use App\Entitis\Helpers;


class HelperRepository
{
    private $model;


    /**
     * HelperRepository constructor.
     * @param Helpers $model
     */
    public function __construct(Helpers $model)
    {
        $this->model=$model;
    }

    public function getAll()
    {
        return Cache::remember('getAll', 1, function() {
            return $this->model->all();
        });
    }

    public function getById($id)
    {
        return Cache::remember('idd', 1, function() use ($id){
            return $this->model->find();
        });
    }

    public function create(array $attributes)
    {
        return Cache::remember('crea', 1, function() use($attributes){
            return $this->model->create($attributes);
        });
    }

    public function update($id, array $attributes)
    {
        return Cache::remember('upda', 1, function() use($id, $attributes){
            $todo = $this->model->findOrFail($id);
            $todo->update($attributes);
            return $todo;
        });
    }

}