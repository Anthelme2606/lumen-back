<?php
// app/Repositories/RepresentantRepository.php

namespace App\Repositories\Representants;

use App\Models\Representant;

class RepresentantRepository
{
    protected $model;

    public function __construct(Representant $representant)
    {
        $this->model = $representant;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $data)
    {
        $representant = $this->model->find($id);
        if ($representant) {
            $representant->update($data);
            return $representant;
        }
        return null;
    }

    public function delete($id)
    {
        $representant = $this->model->find($id);
        if ($representant) {
            $representant->delete();
            return true;
        }
        return false;
    }
}
