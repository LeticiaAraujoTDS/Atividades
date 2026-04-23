<?php

namespace app\services;

use app\models\Animal;
use app\repositories\AnimalRepository;

class AnimalService
{

    private AnimalRepository $repository;

    public function __construct()
    {

        $this->repository = new AnimalRepository();
    }

    public function getAnimais()
    {
        //se existisse a necessidade de uma validacao, ou verificacao, aqui seria o lugar correto
        return $this->repository->getAnimais();
    }

    public function getAnimal(int $id)
    {
        return $this->repository->getAnimal($id);
    }

    public function saveAnimal(Animal $animal)
    {
        return $this->repository->saveAnimal($animal);
    }

    public function updateAnimal(Animal $animal)
    {
        return $this->repository->updateAnimal($animal);
    }

    public function deleteAnimal(int $id)
    {
        return $this->repository->deleteAnimal($id);
    }
}
