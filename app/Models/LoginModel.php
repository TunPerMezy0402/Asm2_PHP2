<?php

namespace App\Models;

use App\Common\Database;

class LoginModel
{
    private $connection;
    private $queryBuilder;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = Database::getQueryBuilder();
    }

    public function checkUser($user, $pass)
    {
        $stmt = $this->queryBuilder
            ->select('*')
            ->from('users')
            ->where('email = :user')
            ->andWhere('password = :pass')
            ->setParameter('user', $user)
            ->setParameter('pass', $pass)
            ->setMaxResults(1)
            ->executeQuery();

        return $stmt->fetchAssociative(); // Lấy dữ liệu dạng mảng kết hợp
    }

    
}
