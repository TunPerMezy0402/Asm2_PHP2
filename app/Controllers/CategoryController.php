<?php
namespace App\Controllers;

use App\Models\CategoryModel;
use Rakit\Validation\Validator;


class CategoryController extends Controller {
    private $categoryModel;

    public function __construct() {
        parent::__construct();
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $title = 'Danh Sách Danh Mục';
        $view = 'categories/index';
        $data = $this->categoryModel->getAll();
        require_once './app/Views/layouts/master.blade.php';
    }

    public function show($id) {
        $title = 'Show Danh Mục';
        $view = 'categories/show';
        $data = $this->categoryModel->findDetail($id);
        require_once './app/Views/layouts/master.blade.php';
    }

    public function add() {
        $title = 'Create Category';
        $view = 'categories/add-category';
        require_once './app/Views/layouts/master.blade.php';
    }

    public function addPost() {
                //Validate
                $validator = new Validator;
                $validation = $validator->make([
                    'name'  => $_POST['name'],
                ], [
                    'name'  => 'required|min:2',
        
                ]);
        
                $validation->validate();
        
                if ($validation->fails()) {
                    $_SESSION['message'] = "Thêm mới thất bại";
                    header("Location:" . $_ENV['BASE_URL'] . 'category/add');
                    exit;
                }
                
                $data = $this->categoryModel->addUser();
                $_SESSION['message'] = "Thêm Mới Thành Công";
                header("Location:" . $_ENV['BASE_URL'] . 'category');
    }

    public function update($id) {
        $title = 'Update Category';
        $view = 'categories/update-category';
        $data = $this->categoryModel->findDetail($id);
        require_once './app/Views/layouts/master.blade.php';
    }

    public function updatePost($id) {
        //Validate
        $validator = new Validator;
        $validation = $validator->make([
            'name'  => $_POST['name']
        ], [
            'name'  => 'required|min:2',

        ]);

        $validation->validate();


        if ($validation->fails()) {
            $_SESSION['message'] = "Update thất bại";
            header("Location:" . $_ENV['BASE_URL'] . 'category/update/' . $id);
            exit;
        }
        
        $data = $this->categoryModel->updateUser($id);
        $_SESSION['message'] = "Update Thành Công";
        header("Location:" . $_ENV['BASE_URL'] . 'category');
    }

    public function delete($id) {
        $data = $this->categoryModel->deleteUser($id);
        $_SESSION['message'] = "Delete Thành Công";
        header("Location:" . $_ENV['BASE_URL'] . 'category');
    }
}