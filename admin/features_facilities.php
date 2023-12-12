<?php
    require('inc/essentials.php');
    require('inc/db_config.php');

    if(isset($_GET['seen'])){
        $frm_data = filteration($_GET);

        if($frm_data['seen']=='all'){
            $q = "UPDATE `user_queries` SET `seen`=?";
            $values = [1];
            if(update($q,$values,'i')){
                alert('success', 'Marked all as read!');
            }else{
                alert('error','Operation Failed');
            }
        }else{
            $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
            $values = [1,$frm_data['seen']];
            if(update($q,$values,'ii')){
                alert('success', 'Marked as read!');
            }else{
                alert('error','Operation Failed');
            }
        }     
    }

    if(isset($_GET['del'])){
        $frm_data = filteration($_GET);

        if($frm_data['del']=='all'){
            $q = "DELETE FROM `user_queries`";
            if(mysqli_query($con, $q)){
                alert('success', 'All data deleted!');
            }else{
                alert('error','Operation Failed');
            }
        }else{
            $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
            $values = [$frm_data['del']];
            if(delete($q,$values,'i')){
                alert('success', 'Data deleted!');
            }else{
                alert('error','Operation Failed');
            }
        }     
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Feature & Facilities</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <?php require('inc/links.php');?>

    <style>
        .custom-alert {
            position: fixed;
            top: 80px;
            right: 25px;
        }
    </style>


</head>
<body class="bg-white">
    
    <?php require('inc/header.php')?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">FEATURE & FACILITIES</h3>

                <!-- Feature Section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="card-title m-0">Features</h5>
                                <button type="button" class="btn btn-dark shadow-none bts-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                    <i class="bi bi-plus-square"></i>Add
                                </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark">
                                    <th scope="col" class="text-light">#</th>
                                    <th scope="col" class="text-light">Name</th>
                                    <th scope="col" class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

                <!-- Facility Section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">Facility</h5>
                                <button type="button" class="btn btn-dark shadow-none bts-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                    <i class="bi bi-plus-square"></i>Add
                                </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark">
                                    <th scope="col" class="text-light">#</th>
                                    <th scope="col" class="text-light">Name</th>
                                    <th scope="col" class="text-light">Icon</th>
                                    <th scope="col" class="text-light" width="40%">Description</th>
                                    <th scope="col" class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

                <!-- Facility modal -->
                <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="facility_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Facility</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="name" name="facility_name" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Icon</label>
                                        <input type="file" name="facility_icon" accept=".svg" class="form-control shadow-none" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="facility_desc" class="form-control" rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


        <!-- Feature modal -->
        <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="feature_s_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Feature</h5>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" id="feature_name"  class="form-control shadow-none" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <?php require('inc/script.php');  ?>

    <script src="scripts/features_facilities.js"></script>
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    
</body>
</html>