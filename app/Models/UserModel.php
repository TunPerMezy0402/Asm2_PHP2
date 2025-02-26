<?php

namespace App\Models;

use App\Common\Database;

class UserModel
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
            ->from('users')
            ->where('id = :id')
            ->setParameters(["id" => $id]);

        return $stmt->fetchAssociative();
    }

    public function getAll()
    {
        $stmt = $this->queryBuilder
            ->select('*')
            ->from('users')
            ->orderBy('id', 'DESC')
            ->executeQuery();

        return $stmt->fetchAllAssociative();
    }

    public function addUser()
    {
        $stmt = $this->queryBuilder->insert('users')
            ->values([
                'name' => ':name',
                'email' => ':email',
                'password' => ':password',
                'role' => ':role'
            ])
            ->setParameters([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' => $_POST['role'],
            ]);
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }

    public function updateUser($id)
    {
        $stmt = $this->queryBuilder
            ->update('users')
            // Thay đổi cách gọi set
            ->set('name', ':name')
            ->set('email', ':email')
            ->set('password', ':password')
            ->set('role', ':role')
            ->where('id = :id')
            ->setParameters([
                'id' => $id, // Sử dụng $id truyền vào hàm
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' => $_POST['role'],
            ]);

        // Gọi executeStatement trên connection
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }


    public function deleteUser($id)
    {
        $stmt = $this->queryBuilder
            ->delete('users')
            ->where('id = :id')
            ->setParameters(["id" => $id]);
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }
}
