<?php

namespace App\Models;

use App\Common\Database;

class ProductModel
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
        ->select('p.*, c.name AS category_name')
        ->from('products', 'p')
        ->leftJoin('p', 'categories', 'c', 'p.category_id = c.id')
        ->where('p.id = :id') // Cần chỉ định rõ 'p.id'
        ->setParameter('id', $id) // Thiết lập giá trị tham số
        ->executeQuery();

    return $stmt->fetchAssociative();
}

public function getOne($id)
    {
        $stmt = $this->queryBuilder
            ->select('*')
            ->from('products')
            ->where('id = :id')
            ->setParameters(["id" => $id]);

        return $stmt->fetchAssociative();
    }


public function getCategory()
{
    $stmt = $this->queryBuilder
        ->select('*')
        ->from('categories')
        ->orderBy('id', 'DESC')
        ->executeQuery();

    return $stmt->fetchAllAssociative();
}

    public function getAll()
    {
        $stmt = $this->queryBuilder
        ->select('p.*, c.name AS category_name')
        ->from('products', 'p')
        ->leftJoin('p', 'categories', 'c', 'p.category_id = c.id')
        ->orderBy('p.id', 'DESC') // Thêm sắp xếp theo id giảm dần
        ->executeQuery();

        return $stmt->fetchAllAssociative();
    }

    public function addProduct($linkImg)
    {
        $stmt = $this->queryBuilder->insert('products')
            ->values([
                'category_id' => ':category_id',
                'name' => ':name',
                'img' => ':img',
                'description' => ':description',
                'created_at' => ':created_at',
                'updated_at' => ':updated_at'
            ])
            ->setParameters([
                'category_id' => $_POST['category_name'],
                'name' => $_POST['name'],
                'img' => $linkImg,
                'description' => $_POST['description'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }

    public function updateProduct($id,$linkImg)
    {
        $stmt = $this->queryBuilder
            ->update('products')
            // Thay đổi cách gọi set
            ->set('category_id', ':category_id')
            ->set('name', ':name')
            ->set('description', ':description')
            ->set('img', ':img')
            ->set('created_at', ':created_at')
            ->set('updated_at', ':updated_at')
            ->where('id = :id')
            ->setParameters([
                'id' => $id, // Sử dụng $id truyền vào hàm
                'name' => $_POST['name'],
                'category_id' => $_POST['category_id'],
                'description' => $_POST['description'],
                'img' => $linkImg,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        // Gọi executeStatement trên connection
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }


    public function deleteProduct($id)
    {
        $stmt = $this->queryBuilder
            ->delete('products')
            ->where('id = :id')
            ->setParameters(["id" => $id]);
        $this->connection->executeStatement($stmt->getSQL(), $stmt->getParameters());
    }
}
