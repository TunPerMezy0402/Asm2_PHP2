<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            
            <form action="<?= BASE_URL ?>user/update/<?= $data['id'] ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= $data['name'] ?>" placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" value="<?= $data['email'] ?>" placeholder="Enter email" name="email" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="text" class="form-control" id="password" value="<?= $data['password'] ?>" placeholder="Enter password" name="password">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="type" class="form-label">Role :</label>
                            <select name="role" id="role" class="form-control">
                                <option <?= $data['role'] === 'admin' ? 'selected' : null ?> value="admin">Admin</option>
                                <option <?= $data['role'] === 'user' ? 'selected' : null ?> value="user">Member</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="mr-3 btn btn-primary">Submit</button>
                    <a href="<?= BASE_URL ?>user" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>