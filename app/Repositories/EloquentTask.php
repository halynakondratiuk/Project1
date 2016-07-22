<?php
/**
 * Created by PhpStorm.
 * User: halyna
 * Date: 17.07.16
 * Time: 17:42
 */

namespace App\Repositories;

use App\Entitis\User;
use Illuminate\Support\Facades\Cache;

class EloquentTask
{
    private $model;

    /**
     * EloquentTask constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model=$model;
    }

    public function getAll()
    {
        return Cache::remember('get', 1, function() {
            return $this->model->all();
        });
    }

    public function getById($id)
    {
        return Cache::remember('ByIdd', 1, function() use ($id){
            return $this->model->find();
        });
    }

    public function create(array $attributes)
    {
        return Cache::remember('reatel', 1, function() use($attributes){
            return $this->model->create($attributes);
        });
    }

    public function update($id, array $attributes)
    {
        return Cache::remember('date', 1, function() use($id, $attributes){
            $todo = $this->model->findOrFail($id);
            $todo->update($attributes);
            return $todo;
        });
    }

    public function delete($id)
    {
        return Cache::remember('delete', 1, function() use($id){
            $this->getById($id)->delete();
            return true;
        });
    }
}