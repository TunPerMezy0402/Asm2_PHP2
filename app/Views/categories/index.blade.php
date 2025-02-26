<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?>
        <a href="<?= BASE_URL ?>category/add" class="btn btn-primary">Thêm Mới</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables Example
            </h6>
        </div>
        <div class="card-body">
        <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Acction</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        foreach ($data as $category => $value) :?>
                            <tr>
                                <td><?= $category +1 ?></td>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['name'] ?></td>

                                <td>
                                    <a href="<?= BASE_URL ?>category/show/<?= $value['id']?>" class="btn btn-info">Show</a>
                                    <a href="<?= BASE_URL ?>category/update/<?= $value['id']?>" class="btn btn-warning">Update</a>
                                    <a href="<?= BASE_URL ?>category/delete/<?= $value['id']?>" 
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>STT</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Acction</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>