<?php
namespace Repositories;

use PDO;
use PDOException;
use Models\Category;

class CategoryRepository extends Repository
{
    function getAllCategories($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT * FROM categories";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, Category::class);
            $categories = $stmt->fetchAll();
            return $categories;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}