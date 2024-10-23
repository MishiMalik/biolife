<?php

$active = "statistics";

include_once "includes/header.php";

if (isset($_POST['submit'])) {
    update($pdo, "stats", ["value" => $_POST['countries']], "name", "countries");
    update($pdo, "stats", ["value" => $_POST['experience']], "name", "experience");
    update($pdo, "stats", ["value" => $_POST['satisfaction']], "name", "satisfaction");
}

$stats = fetchAll($pdo, "SELECT * FROM stats");

?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- <h4 class="pt-3 pb-2">Statistics</h4> -->
        <div class="card">
            <h5 class="card-header mb-0 pb-2 text-primary mb-3">Statistics</h5>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="">Countries of Operation</label>
                        <input required type="text" name="countries" value="<?php echo $stats[0]->value; ?>" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Years of Experience</label>
                        <input required type="text" name="experience" value="<?php echo $stats[1]->value; ?>" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Customer Satisfaction</label>
                        <input required type="text" name="satisfaction" value="<?php echo $stats[2]->value; ?>" class="form-control" />
                    </div>
                    <!-- <div class="mb-3">
                                        <textarea class="form-control" id="" width="100%" rows="10" value=""></textarea>
                                    </div> -->
                    <div class="d-flex justify-content-end">
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