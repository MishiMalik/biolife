<?php

$active = "team";

include_once "includes/header.php";

function uploadImage($imageFile) {
    // Check if the file was uploaded successfully
    if (isset($imageFile) && $imageFile['error'] === UPLOAD_ERR_OK) {

        // Get file details
        $fileName = $imageFile['name'];
        $fileSize = $imageFile['size'];
        $tmpName = $imageFile['tmp_name'];

        // Check allowed file types (modify as needed)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file type
        if (!in_array($fileExtension, $allowedExtensions)) {
            return json_encode(['status' => 'error', 'msg' => 'Error: Only JPG, JPEG, PNG, GIF and WEBP files are allowed.']);
        }

        // Check file size (optional)
        if ($fileSize > 5000000) { // Adjust as needed (5mb)
            return json_encode(['status' => 'error', 'msg' => 'Error: File size exceeds the limit of 5mb.']);
        }

        // Generate a unique filename (optional)
        $newFilename = uniqid() . "." . $fileExtension;

        // Define the upload path (modify as needed)
        $uploadPath = "../assets/images/team/";

        // Upload the file
        if (move_uploaded_file($tmpName, $uploadPath . $newFilename)) {
            return json_encode(['status' => 'success', 'msg' => $newFilename]);
        } else {
            return json_encode(['status' => 'error', 'msg' => 'Failed to upload file.']);
        }
    } else {
        return json_encode(['status' => 'error', 'msg' => "No file uploaded or upload error: " . $imageFile['error']]);
    }
}

$msg = "";

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    delete($pdo, "team", "id", $_GET['delete']);

    redirect("team.php");
}

if (isset($_POST['submit'])) {
    unset($_POST['submit']);

    $fileUploaded = json_decode(uploadImage($_FILES['image']));
    if ($fileUploaded->status == "success") {
        $_POST['image'] = $fileUploaded->msg;
        insert($pdo, "team", $_POST);

        $msg = json_decode(json_encode(["status" => "success", "msg" => "Data inserted successfully!"]));
    } else {
        $msg = $fileUploaded;
    }
}

$team = fetchAll($pdo, "SELECT * FROM team");

?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Team</h4>
        <div class="card">
            <h5 class="card-header mb-0 pb-2 text-primary mb-3">Add Team Member</h5>
            <div class="card-body">

                <?php if (!empty($msg) && $msg->status == "error") : ?>
                    <small class="text-danger"><?php echo $msg->msg; ?></small>
                <?php elseif (!empty($msg) && $msg->status == "success") : ?>
                    <small class="text-success"><?php echo $msg->msg; ?></small>
                <?php endif; ?>

                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input required type="text" name="name" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input required type="file" name="image" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 w-100">
                                <label for="">Designation</label>
                                <input required type="text" name="designation" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3 w-100">
                                <label for="">Description</label>
                                <textarea required class="form-control" name="description" id="" width="100%" rows="10" value=""></textarea>
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


        <!-- <hr class="my-5" /> -->

        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <div class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column ">
                <h5 class="card-header px-0 pb-3">Team Members</h5>
            </div>
            <div class=" datatable-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Images</th>
                            <th>Designation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($team)) : ?>
                            <?php foreach ($team as $index => $member) : ?>
                                <tr>
                                    <td><?php echo ++$index; ?></td>
                                    <td><?php echo $member->name; ?></td>
                                    <td>
                                        <img src="../assets/images/team/<?php echo $member->image; ?>" alt="" style="width: 40px; height: auto;">
                                    </td>
                                    <td>
                                        <?php echo $member->designation; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="edit-team.php?id=<?php echo $member->id; ?>"><button type="button" class="edit-data">Edit</button></a>
                                            <a href="?delete=<?php echo $member->id; ?>"><button class="delete-data" type="button">Delete</button></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>


                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->


        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Thematic Area</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body ">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="basic-default-fullname" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="file" class="form-control" id="basic-default-fullname" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3 w-100">
                            <label for="">Description</label>
                            <textarea class="form-control" id="" width="100%" rows="10" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

include_once "includes/footer.php";

?>