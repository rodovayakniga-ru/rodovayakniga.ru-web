<?php

namespace App\Services;

use App\Repositories\Rod\RodRepository;
use Illuminate\Database\Eloquent\Collection;

class RodService
{
    protected RodRepository $rodRepository;

    /**
     * @param RodRepository $rodRepository
     */
    public function __construct(RodRepository $rodRepository)
    {
        $this->rodRepository = $rodRepository;
    }

    public function getAll(): Collection
    {
        return $this->rodRepository->all();
    }

    public function getById($id)
    {
        return $this->rodRepository->find($id);
    }

    public function create($data)
    {
        return $this->rodRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->rodRepository->update($id, $data);
    }

    public function delete($id): void
    {
        $this->rodRepository->delete($id);
    }
}