<?php

namespace App\Controllers;

use App\Models\LoginModel;
use Rakit\Validation\Validator;


class LoginController extends Controller
{
    private $LoginModel;

    public function __construct()
    {
        parent::__construct();
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] != '') {

            require_once "./app/Views/layouts/master.blade.php";
        } else {
            require_once "./app/Views/layouts/client.blade.php";
        }
    }

    public function login()
    {
        require_once "./app/Views/layouts/login.blade.php";

    }

    public function loginPost()
    {
        $user = isset($_POST['user']) ? $_POST['user'] : null; // Kiểm tra nếu tồn tại
        $pass = isset($_POST['pass']) ? $_POST['pass'] : null; // Kiểm tra nếu tồn tại
    
            // Kiểm tra điều kiện
            if ($user && $pass) {
                $taikhoan = $this->LoginModel->checkUser($user, $pass);
    
                if ($taikhoan == null) {
                    header("Location:" . BASE_URL .'login');
                }
                if (is_array($taikhoan)) {
                    $role = $taikhoan['role'];
    
                    if ($role == 'admin') {
                        $_SESSION['id'] = $taikhoan['id'];
                        $_SESSION['name_admin'] = $taikhoan['name'];
                        $_SESSION['email'] = $taikhoan['email'];
                        $_SESSION['pass'] = $taikhoan['password'];
                        $_SESSION['role'] = $role;
                        header("Location:" . BASE_URL .'dashboard');
                        exit(); // Dừng thực thi sau khi chuyển hướng
                    } elseif ($role == 'user') {
                        $_SESSION['id'] = $taikhoan['id'];
                        $_SESSION['name'] = $taikhoan['name'];
                        $_SESSION['email'] = $taikhoan['email'];
                        $_SESSION['pass'] = $taikhoan['password'];
                        $_SESSION['role'] = $role;
                        header("Location:" . BASE_URL);
                        exit(); // Dừng thực thi sau khi chuyển hướng
                    } else {
                        header("Location:" . BASE_URL . "404.php");
                        exit(); // Dừng thực thi sau khi chuyển hướng
                    }
                }
            } else {
                header("Location:" . BASE_URL .'login');
            }
        
    }

    public function Logout() {
        session_unset();
        header("Location:" . BASE_URL);
    }
}
