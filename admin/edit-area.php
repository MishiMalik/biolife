<?php

$active = "areas";

include_once "includes/header.php";

if (!isset($_GET['id'])) {
    redirect("thematic-areas.php");
}

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
        $uploadPath = "../assets/images/thematic/";

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

if (isset($_POST['submit'])) {
    unset($_POST['submit']);

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $fileUploaded = json_decode(uploadImage($_FILES['image']));
        if ($fileUploaded->status == "success") {
            $_POST['image'] = $fileUploaded->msg;
            update($pdo, "thematic_areas", $_POST, "id", $_GET['id']);

            $msg = json_decode(json_encode(["status" => "success", "msg" => "Data updated successfully!"]));
        } else {
            $msg = $fileUploaded;
        }
    } else {
        update($pdo, "thematic_areas", $_POST, "id", $_GET['id']);

        $msg = json_decode(json_encode(["status" => "success", "msg" => "Data updated successfully!"]));
    }
}

$area = findById($pdo, "thematic_areas", $_GET['id']);

?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Thematic Areas</h4>
        <div class="card">
            <h5 class="card-header mb-0 pb-2 text-primary mb-3">Edit Thematic Area</h5>
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
                                <label for="">Title</label>
                                <input required type="text" name="title" value="<?php echo $area->title; ?>" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="">Image <small>(Optional)</small></label>
                                <input type="file" name="image" class="form-control" id="basic-default-fullname" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 w-100">
                                <label for="">Description</label>
                                <textarea required class="form-control" name="description" id="" width="100%" rows="10" value=""><?php echo $area->description; ?></textarea>
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