<?php
namespace App\Controllers;

use App\Models\ProductModel;
use Rakit\Validation\Validator;


class ProductController extends Controller {
    private $productModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new ProductModel();
    }

    public function index() {
        $title = 'Danh Sách Sản Phẩm';
        $view = 'products/index';
        $data = $this->productModel->getAll();
        require_once './app/Views/layouts/master.blade.php';
    }

    public function show($id) {
        $title = 'Show Product';
        $view = 'products/show';
        $data = $this->productModel->findDetail($id);
        require_once './app/Views/layouts/master.blade.php';
    }

    public function add() {
        $title = 'Create Product';
        $data = $this->productModel->getCategory();
        $view = 'products/add-product';
        require_once './app/Views/layouts/master.blade.php';
    }

    public function addPost() {
                //Validate
                $validator = new Validator;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $validation = $validator->make([
                    'category_id'  => $_POST['category_name'],
                    'name'  => $_POST['name'],
                    'img'  => $_FILES['image']['name'],
                    'description'  => $_POST['description'],
                ], [
                    'category_id'  => 'required',
                    'name'  => 'required',
                    'img'  => 'required',
                    'description'  => 'required',
                ]);

                $validation->validate();
        
                if ($validation->fails()) {
                    $_SESSION['sussess'] = "Thêm mới thất bại";
                    header("Location:" . $_ENV['BASE_URL'] . 'product/add');
                    exit;
                }

                $linkImg = null;
                $file = $_FILES['image'];
                if(isset($file['name']) && $file['name'] != '') {
                    $fileName = time() . '_' . basename($file['name']);
                    move_uploaded_file($file['tmp_name'], "upload/products/$fileName");
                    $linkImg = "$fileName";
                }
                
                $data = $this->productModel->addProduct($linkImg);
                $_SESSION['message'] = "Thêm Mới Thành Công";
                header("Location:" . $_ENV['BASE_URL'] . 'product');
    }

    public function update($id) {
        $title = 'Update Product';
        $view = 'products/update-product';
        $cate = $this->productModel->getCategory();
        $data = $this->productModel->findDetail($id);
        require_once './app/Views/layouts/master.blade.php';
    }

    public function updatePost($id) {
        //Validate
        $validator = new Validator;
        $validation = $validator->make([
            'category_id'  => $_POST['category_id'],
            'name'  => $_POST['name'],
            'img'  => $_FILES['image']['name'],
            'description'  => $_POST['description'],
        ], [
            'category_id'  => 'required',
            'name'  => 'required',
            'description'  => 'required'
        ]);

        $validation->validate();


        if ($validation->fails()) {
            $_SESSION['message'] = "Update thất bại: " . implode(', ', $validation->errors()->all());
            header("Location:" . BASE_URL . 'product/update/' . $id);
            exit;
        }
        

        $product = $this->productModel->getOne($id);
        $linkImg = $product['img'];
        $file = $_FILES['image'];

        if (isset($file['name']) && $file['name'] != "") {
            unlink("upload/products/" . $linkImg);
            $fileName = time() . '_' . basename($file['name']);
            move_uploaded_file($file['tmp_name'], "upload/products/$fileName");
            $linkImg = "$fileName";
        }
        
        $data = $this->productModel->updateProduct($id,$linkImg);
        
        $_SESSION['message'] = "Update Thành Công";
        header("Location:" . $_ENV['BASE_URL'] . 'product');
    }

    public function delete($id) {
        $data = $this->productModel->deleteProduct($id);
        $_SESSION['message'] = "Delete Thành Công";
        header("Location:" . $_ENV['BASE_URL'] . 'product');
    }
}