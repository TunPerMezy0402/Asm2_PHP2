<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Create
            </h6>
        </div>
        <div class="card-body">
        <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <form action="<?= BASE_URL ?>product/add" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="form-control" id="name"
                                value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>"
                                placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="description" class="form-label">Description :</label>
                            <input type="description" class="form-control" id="description"
                            value="<?= isset($_SESSION['data']) ? $_SESSION['data']['description'] : null ?>"
                            placeholder="Enter description" name="description">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image :</label>
                            <input type="file" class="form-control" id="image"
                                value="<?= isset($_SESSION['data']) ? $_SESSION['data']['image'] : null ?>"
                                placeholder="Image" name="image">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Danh Mục :</label>
                            <select name="category_name" id="category_id" class="form-control">
                                <?php  foreach ($data as $key => $value):  ?>
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['category_id'] == $value['id'] ? 'selected' : null ?> value= <?= $value['id'] ?>><?= $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                    <button type="submit" class="mr-3 btn btn-primary">Submit</button>
                    <a href="<?= BASE_URL ?>/product" class="btn btn-danger">Back to list</a>

            </form>
        </div>
    </div>
</div>