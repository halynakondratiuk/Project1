<?php
/**
 * Created by PhpStorm.
 * User: halyna
 * Date: 21.07.16
 * Time: 8:28
 */

namespace App\Repositories;

use App\Entitis\Categories;
use Illuminate\Support\Facades\Cache;


class CategoryRepository
{
    private $model;


    /**
     * CategoryRepository constructor.
     * @param Categories $model
     */
    public function __construct(Categories $model)
    {
        $this->model=$model;
    }

    public function getAll()
    {
        return Cache::remember('getAlll', 1, function() {
            return $this->model->all();
        });
    }

    public function getById($id)
    {
        return Cache::remember('getByIdd', 1, function() use ($id){
           return $this->model->find();
        });
    }

    public function create(array $attributes)
    {
        return Cache::remember('createe', 1, function() use($attributes){
            return $this->model->create($attributes);
        });
    }

    public function update($id, array $attributes)
    {
        return Cache::remember('updatee', 1, function() use($id, $attributes){
            $todo = $this->model->findOrFail($id);
            $todo->update($attributes);
            return $todo;
        });
    }

}