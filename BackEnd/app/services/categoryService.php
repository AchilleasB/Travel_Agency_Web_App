<?php
namespace Services;

use Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function getAllCategories($offset = NULL, $limit = NULL)
    {
        return $this->categoryRepository->getAllCategories($offset, $limit);
    }

}