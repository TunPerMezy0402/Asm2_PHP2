<?php
namespace App\Controllers;

use App\Models\UserModel;
use Rakit\Validation\Validator;


class UserController extends Controller {
    private $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    public function dashboard() {
        $title = 'Trang chủ';
        $view = 'dashboard';
        require_once './app/Views/layouts/master.blade.php';
    }

    public function index() {
        $title = 'Danh Sách Người Dùng';
        $view = 'users/index';
        $data = $this->userModel->getAll();
        require_once './app/Views/layouts/master.blade.php';
    }

    public function show($id) {
        $title = 'Show User';
        $view = 'users/show';
        $data = $this->userModel->findDetail($id);
        require_once './app/Views/layouts/master.blade.php';
    }

    public function add() {
        $title = 'Create User';
        $view = 'users/add-user';
        require_once './app/Views/layouts/master.blade.php';
    }

    public function addPost() {
                //Validate
                $validator = new Validator;
                $validation = $validator->make([
                    'name'  => $_POST['name'],
                    'email' => $_POST['email'],
                    'password'  => $_POST['password'],
                    'role' => $_POST['role']
                ], [
                    'name'  => 'required|min:3',
                    'email' => 'required|email',
                    'password'  => 'required|min:3',
                    'role' => 'required'
        
                ]);
        
                $validation->validate();
        
                if ($validation->fails()) {
                    $_SESSION['sussess'] = "Thêm mới thất bại";
                    header("Location:" . $_ENV['BASE_URL'] . 'user/add');
                    exit;
                }
                
                $data = $this->userModel->addUser();
                $_SESSION['message'] = "Thêm Mới Thành Công";
                header("Location:" . $_ENV['BASE_URL'] . 'user');
    }

    public function update($id) {
        $title = 'Update User';
        $view = 'users/update-user';
        $data = $this->userModel->findDetail($id);
        require_once './app/Views/layouts/master.blade.php';
    }

    public function updatePost($id) {
        //Validate
        $validator = new Validator;
        $validation = $validator->make([
            'name'  => $_POST['name'],
            'email' => $_POST['email'],
            'password'  => $_POST['password'],
            'role' => $_POST['role']
        ], [
            'name'  => 'required|min:3',
            'email' => 'required|email',
            'password'  => 'required|min:3',
            'role' => 'required'

        ]);

        $validation->validate();


        if ($validation->fails()) {
            $_SESSION['message'] = "Update thất bại";
            header("Location:" . $_ENV['BASE_URL'] . 'user/update/' . $id);
            exit;
        }
        
        $data = $this->userModel->updateUser($id);
        $_SESSION['message'] = "Update Thành Công";
        header("Location:" . $_ENV['BASE_URL'] . 'user');
    }

    public function delete($id) {
        $data = $this->userModel->deleteUser($id);
        $_SESSION['message'] = "Delete Thành Công";
        header("Location:" . $_ENV['BASE_URL'] . 'user');
    }
}