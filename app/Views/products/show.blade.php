<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail User
            </h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ Liệu</th>    
                </tr>
                <tr>
                    <th>ID</th>
                    <th><?= $data['id'] ?></th>    
                </tr>
                <tr>
                    <th>Name</th>
                    <th><?= $data['name'] ?></th>    
                </tr>
                <tr>
                    <th>Image</th>
                    <th>
                    <?php if (!empty($data['img'])): ?>
                        <img src="<?= BASE_URL ?>/upload/products/<?= $data['img'] ?>" width="200" alt="">
                    <?php else: ?>
                        <p>Chưa có ảnh.</p>
                    <?php endif; ?>

                    </th>    
                </tr>
                <tr>
                    <th>Description</th>
                    <th><?= $data['description'] ?></th>    
                </tr>
                <tr>
                    <th>Created_at</th>
                    <th><?= $data['created_at'] ?></th>    
                </tr>
                <tr>
                    <th>Updated_at</th>
                    <th><?= $data['updated_at'] ?></th>    
                </tr>
                

            </table>
            <a href="<?= BASE_URL ?>product" class="btn btn-danger">Back to list</a>
        </div>
    </div>
</div>