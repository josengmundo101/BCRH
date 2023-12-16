<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
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
                <h3 class="mb-4">ROOMS</h3>

                <!-- Room Section -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none bts-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i>Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark">
                                    <th scope="col" class="text-light">#</th>
                                    <th scope="col" class="text-light">Name</th>
                                    <th scope="col" class="text-light">Area</th>
                                    <th scope="col" class="text-light">Guest</th>
                                    <th scope="col" class="text-light">Price</th>
                                    <th scope="col" class="text-light">Quantity</th>
                                    <th scope="col" class="text-light">Status</th>
                                    <th scope="col" class="text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 


                <!-- Edit room modal -->
                <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="edit_room_form" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Room</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="name"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Area</label>
                                            <input type="number" min="1" name="area"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Price</label>
                                            <input type="number" min="1" name="price"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Quantity</label>
                                            <input type="number" min="1" name="quantity"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Adult (Max.)</label>
                                            <input type="number" min="1" name="adult"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Children (Max.)</label>
                                            <input type="number" min="1" name="children"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-12 md-3">
                                            <label class="form-label fw-bold">Feature</label>
                                            <div class="row">
                                            <?php
                                                $res = selectAll('features');
                                                while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-2'>
                                                            <label>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>

                                                    ";
                                                }
                                            ?>
                                        </div>
                                        </div>
                                        <div class="col-12 md-3">
                                            <label class="form-label fw-bold">Facilities</label>
                                            <div class="row">
                                            <?php
                                                $res = selectAll('facilities');
                                                while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>

                                                    ";
                                                }
                                            ?>
                                        </div>
                                        </div>
                                        <div class="col-12mb-3">
                                            <label class="form-label fw-bold">Description</label>
                                            <textarea name="desc" rows="4" class="form-control shadow-none"></textarea>
                                        </div>
                                        <input type="hidden" name="room_id">
                                    </div>
                                <div class="modal-footer">
                                    <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                        </div>
                    </div>

                    <!-- Manage room images modal -->
                <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Room Name</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="image-alert"></div>
                            <div class="border-bottom border-3 pb-3 mb-3">
                                <form id="add_image_form">
                                    <label class="form-label fw-bold">Add Image</label>
                                    <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                                    <button class="btn custom-bg text-white shadow-none">ADD</button>
                                    <input type="hidden" name="room_id">
                                </form>
                            </div>
                            <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark sticky-top">
                                    <th scope="col" class="text-light" width="60%">Image</th>
                                    <th scope="col" class="text-light">Thumb</th>
                                    <th scope="col" class="text-light">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="room-image-data">
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
                </div> 
    </div>


                <!-- Add room modal -->
                <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="add_room_form" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Room</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="name"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Area</label>
                                            <input type="number" min="1" name="area"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Price</label>
                                            <input type="number" min="1" name="price"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Quantity</label>
                                            <input type="number" min="1" name="quantity"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Adult (Max.)</label>
                                            <input type="number" min="1" name="adult"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Children (Max.)</label>
                                            <input type="number" min="1" name="children"  class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-12 md-3">
                                            <label class="form-label fw-bold">Feature</label>
                                            <div class="row">
                                            <?php
                                                $res = selectAll('features');
                                                while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-2'>
                                                            <label>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>

                                                    ";
                                                }
                                            ?>
                                        </div>
                                        </div>
                                        <div class="col-12 md-3">
                                            <label class="form-label fw-bold">Facilities</label>
                                            <div class="row">
                                            <?php
                                                $res = selectAll('facilities');
                                                while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                            </label>
                                                        </div>

                                                    ";
                                                }
                                            ?>
                                        </div>
                                        </div>
                                        <div class="col-12mb-3">
                                            <label class="form-label fw-bold">Description</label>
                                            <textarea name="desc" rows="4" class="form-control shadow-none"></textarea>
                                        </div>
                                    
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

    <script src="scripts/rooms.js"></script>
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    
    
</body>
</html>