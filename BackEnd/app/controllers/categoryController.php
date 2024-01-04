<?php
namespace Controllers;

use Services\CategoryService;
// require_once __DIR__ . '/../services/categoryservice.php';
// require_once __DIR__ . '/controller.php';

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function getAll()
    {
        // Checks for a valid jwt, returns 401 if none is found
        // $token = $this->checkForJwt();
        // if (!$token)
        //     return;

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