<?php
/**
 * Created by PhpStorm.
 * User: halyna
 * Date: 21.07.16
 * Time: 8:29
 */

namespace App\Repositories;

use App\Entitis\Animals;
use App\Entitis\Categories;
use Illuminate\Support\Facades\Cache;


class AnimalRepository
{
    private $model;


    /**
     * AnimalRepository constructor.
     * @param Animals $model
     */
    public function __construct(Animals $model)
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
        return $this->model->with('helper')->find($id);

    }

    public function create(array $attributes)
    {
        return Cache::remember('create', 1, function() use ($attributes){
            return $this->model->create($attributes);
        });


    }

    public function update($id, array $attributes)
    {
        return Cache::remember('update', 1, function() use ($id, $attributes) {
            $todo = $this->model->findOrFail($id);
            $todo->update($attributes);
            return $todo;
        });

    }
    
    public function getCats()
    {
        return Cache::remember('getCats', 1, function() {
            return $this->model->where('category_id', 2)->get();
        });
    }

    public function getDogs()
    {
        return Cache::remember('getDogs', 1, function() {
            return $this->model->where('category_id', 1)->get();
        });
    }

    public function getAnimalsByCategory($id)
    {
        return Cache::remember('getAnimalsByCategory' . $id, 1, function() use ($id){
            return $this->model->where('category_id', $id)->get();
        });
        
    }
    
    

    

}