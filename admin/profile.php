<?php

$active = "profile";

include_once "includes/header.php";

$msg = "";

if (isset($_POST['submit'])) {
    unset($_POST['submit']);

    if (empty($_POST['password'])) {
        unset($_POST['password']);
    } else {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    update($pdo, "users", $_POST, "id", $_SESSION['user']->id);

    $msg = json_decode(json_encode(["status" => "success", "msg" => "Data updated successfully!"]));
}

$profile = findById($pdo, "users", $_SESSION['user']->id);

?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Profile</h4>
        <div class="card">
            <h5 class="card-header mb-0 pb-2 text-primary mb-3">Edit Profile</h5>
            <div class="card-body">

                <?php if (!empty($msg) && $msg->status == "error") : ?>
                    <small class="text-danger"><?php echo $msg->msg; ?></small>
                <?php elseif (!empty($msg) && $msg->status == "success") : ?>
                    <small class="text-success"><?php echo $msg->msg; ?></small>
                <?php endif; ?>

                <form method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input required type="text" name="name" value="<?php echo $profile->name; ?>" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input required type="text" name="email" value="<?php echo $profile->email; ?>" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="">Password <small>(Leave empty to not change password)</small></label>
                                <input type="text" name="password" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>

                    </div>

                    <div class="add-more-make">

                    </div>
                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>

<?php

include_once "includes/footer.php";

?>