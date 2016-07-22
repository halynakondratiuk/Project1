<?php
/**
 * Created by PhpStorm.
 * User: halyna
 * Date: 19.07.16
 * Time: 11:30
 */

namespace App\Repositories;


use App\Entitis\Notes;

class NotesRepository
{
    private $model;


    /**
     * EloquentTask constructor.
     * @param ToDoTasks $model
     */
    public function __construct(Notes $model)
    {
        $this->model=$model;
    }

    public function getAll()
    {
        return Cache::remember('getAl', 1, function() {
            return $this->model->all();
        });
    }

    public function getById($id)
    {
        return Cache::remember('getByI', 1, function() use ($id){
            return $this->model->find();
        });
    }

    public function create(array $attributes)
    {
        return Cache::remember('creat', 1, function() use($attributes){
            return $this->model->create($attributes);
        });
    }

    public function update($id, array $attributes)
    {
        return Cache::remember('updat', 1, function() use($id, $attributes){
            $todo = $this->model->findOrFail($id);
            $todo->update($attributes);
            return $todo;
        });
    }
}