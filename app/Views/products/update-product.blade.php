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
            <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['message'] ?>
            </div>
            <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            <form action="<?= BASE_URL ?>product/update/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="form-control" id="name" value="<?= $data['name'] ?>"
                                placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="description" class="form-label">Description :</label>
                            <input type="text" class="form-control" id="description"
                                value="<?= $data['description'] ?>" placeholder="Enter description" name="description">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image :</label>
                            <input type="file" class="form-control mb-4" id="image"
                                value="<?= BASE_URL . 'upload/products/' . $data['img'] ?>" placeholder="Image"
                                name="image">
                            <img width="610" src="<?= BASE_URL . 'upload/products/' . $data['img'] ?>"
                                alt="">

                        </div>
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Danh Mục :</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <?php foreach ($cate as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"
                                    <?= $value['id'] === $data['category_id'] ? 'selected' : '' ?>>
                                    <?= $value['name'] ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="mr-3 btn btn-primary">Submit</button>
                <a href="<?= BASE_URL ?>product" class="btn btn-danger">Back to list</a>

            </form>
        </div>
    </div>
</div>
