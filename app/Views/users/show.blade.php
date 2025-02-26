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
                <?php
                 foreach ($data as $fieldName => $value): ?>
                    <tr>
                        <td><?= ucfirst($fieldName) ?></td>
                        <td><?php
                            switch ($fieldName) {
                                case 'password':
                                    echo $value;
                                    break;

                                case 'role':
                                    echo $value == "admin"
                                        ? '<span class="badge badge-success">Admin</span>'
                                        : '<span class="badge badge-warning">Member</span>';
                                    break;

                                default:
                                    echo $value;
                                    break;
                            }
                            ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
            <a href="<?= BASE_URL ?>user" class="btn btn-danger">Back to list</a>
        </div>
    </div>
</div>