<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">BAY </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">BAY</label>
                        <select class="form-select form-select " name="" id="">
                            <option selected>Select BAY</option>
                            <option value="">bay1</option>
                            <option value="">bay2</option>
                            <option value="">bay3</option>
                        </select>
                    </div>


                    <!-- <div class="mb-3 make-div">
                    <div class="mb-3">
                        <label for="" class="form-label">Bay</label>
                        <select
                            class="form-select form-select " name=""   id="">
                            <option selected>Select BAY</option>
                            <option value="">bay1</option>
                            <option value="">bay2</option>
                            <option value="">bay3</option>
                        </select>
                      </div>
                  </div> -->


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Delete Modal -->
<div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <h2 class="modal-title text-center" style="font-size: 26px; font-weight: 600; color:red;">
                            Are You Sure?</h2>
                        <div class="d-flex justify-content-center mt-4">
                            <img src="/assets/img/undraw_Throw_away_re_x60k.png" alt="" class="img-fluid mx-auto" width="200">
                        </div>
                        <p class="text-center mb-0 pb-0 mt-3" style="font-size: 16px; font-weight: 500; color:gray;">You want to delete?</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="./assets/vendor/libs/jquery/jquery.js"></script>
<script src="./assets/vendor/libs/popper/popper.js"></script>
<script src="./assets/vendor/js/bootstrap.js"></script>
<script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="./assets/vendor/js/menu.js"></script>

<!-- Main JS -->
<script src="./assets/js/main.js"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    // new DataTable('#example');
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": false,
            "info": false
        });

    });
</script>
<script>
    // jQuery document ready function
    $(document).ready(function() {
        // Add click event handler to delete-make button
        $('.delete-make').on('click', function() {
            // Find the closest make-div and remove it
            $(this).closest('.make-div').remove();
        });
    });
</script>
</body>

</html>