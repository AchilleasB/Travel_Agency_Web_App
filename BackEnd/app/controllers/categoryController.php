<?php
namespace Controllers;

use Services\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function getAll()
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        // var_dump('CategoryController::getAll method executed', $_GET);

        $categories = $this->categoryService->getAllCategories($offset, $limit);

        if(!$categories){
            $this->respondWithError(404, "No categories found");
            return;
        }
        $this->respond($categories);

        
    }

}