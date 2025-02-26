<?php

namespace App\Models;

use App\Common\Database;

class CategoryModel
{
    private $connection;
    private $queryBuilder;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = Database::getQueryBuilder();
    }

    public function findDetail($id)
    {
        $stmt = $this->queryBuilder
            ->select('*')
            ->from('categories')
            ->where('id = :id')
            ->setParameters(["id" => $id]);

        return $stmt->fetchAssociative();
    }

    public function getAll()
    {
        $stmt = $this->queryBuilder
            ->select('*')
            ->from('categories')
            ->orderBy('id', 'DESC')
            ->executeQuery();

        return $stmt->fetchAllAssociative();
    }

    public function addUser()
    {
        $stmt = $this->queryBuilder->insert('categories')
            ->values([
                'name' => ':name'
            ])
            ->setParameters([
                'name' => $_POST['name'],
            ]);
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }

    public function updateUser($id)
    {
        $stmt = $this->queryBuilder
            ->update('categories')
            // Thay đổi cách gọi set
            ->set('name', ':name')
            ->where('id = :id')
            ->setParameters([
                'id' => $id, // Sử dụng $id truyền vào hàm
                'name' => $_POST['name'],
            ]);

        // Gọi executeStatement trên connection
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }


    public function deleteUser($id)
    {
        $stmt = $this->queryBuilder
            ->delete('categories')
            ->where('id = :id')
            ->setParameters(["id" => $id]);
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }
}
