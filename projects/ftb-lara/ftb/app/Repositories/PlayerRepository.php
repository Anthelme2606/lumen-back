<?php
// app/Repositories/playerRepository.php

namespace App\Repositories;

use App\Models\player;

class PlayerRepository
{
    protected $model;

    public function __construct(player $player)
    {
        $this->model = $player;
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
        $player = $this->model->find($id);
        if ($player) {
            $player->update($data);
            return $player;
        }
        return null;
    }

    public function delete($id)
    {
        $player = $this->model->find($id);
        if ($player) {
            $player->delete();
            return true;
        }
        return false;
    }
}
