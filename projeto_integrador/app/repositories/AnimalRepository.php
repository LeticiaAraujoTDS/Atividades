<?php

namespace app\repositories;

use app\database\ConnectionFactory;
use app\models\Animal;
use PDO;

class AnimalRepository
{

    private PDO $connection;


    function __construct()
    {
        $this->connection = ConnectionFactory::getConnection();
    }

    public function getAnimais(): array
    {

        $stm = $this->connection->prepare("SELECT * FROM animais");
        $stm->execute();

        $animais = $stm->fetchAll();

        return $animais;
    }

    public function getAnimal(int $id)
    {

        $stm = $this->connection->prepare("SELECT * FROM animais WHERE id = :id");
        $stm->bindValue('id', $id);

        $stm->execute();

        $animal = $stm->fetch();

        return $animal;
    }

    public function saveAnimal(Animal $animal)
    {

        $sql = "INSERT INTO animais (nome, idade) " .
            "VALUES(:nome, :idade)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome', $animal->getNome());
        $stmt->bindValue(':idade', $animal->getIdade());
        return $stmt->execute();
    }

    public function updateAnimal(Animal $animal)
    {
        $sql = "UPDATE animais SET nome = :nome, idade = :idade WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':nome', $animal->getNome());
        $stmt->bindValue(':idade', $animal->getIdade());
        $stmt->bindValue(':id', $animal->getId());
        return $stmt->execute();
    }

    public function deleteAnimal(int $id)
    {
        $sql = "DELETE FROM animais WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
