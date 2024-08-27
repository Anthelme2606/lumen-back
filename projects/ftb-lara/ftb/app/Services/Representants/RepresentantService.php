<?php
namespace App\Services\Representants;

use App\Repositories\Representants\RepresentantRepository;

class RepresentantService
{
    protected $representantRepository;

    public function __construct(RepresentantRepository $representantRepository)
    {
        $this->representantRepository = $representantRepository;
    }

    public function getAllRepresentants()
    {
        return $this->representantRepository->getAll();
    }

    public function createRepresentant(array $data)
    {
        return $this->representantRepository->create($data);
    }

    public function getRepresentantById($id)
    {
        return $this->representantRepository->find($id);
    }

    public function updateRepresentant($id, array $data)
    {
        return $this->representantRepository->update($id, $data);
    }

    public function deleteRepresentant($id)
    {
        return $this->representantRepository->delete($id);
    }
}
