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
            <form action="<?= BASE_URL ?>category/add" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name"
                                value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>"
                                placeholder="Enter name" name="name">
                        </div>
                    </div>
                </div>
                    <button type="submit" class="mr-3 btn btn-primary">Submit</button>
                    <a href="<?= BASE_URL ?>category" class="btn btn-danger">Back to list</a>

            </form>
        </div>
    </div>
</div>