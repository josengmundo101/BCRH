
<div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2">BCRH</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nihil voluptate blanditiis distinctio assumenda in quam,
                    laboriosam accusantium numquam cum. 
                    Commodi, nisi! Ex impedit debitis totam excepturi expedita eos, officia doloremque?
                </p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Link</h5>
                <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
                <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
                <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
                <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a><br>
                <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Follow us</h5>
                <?php   
                    if($contact_r['tw']!=''){
                        echo<<< data
                            <a href="$contact_r[tw]" class="d-inline-block text-dark tex-decoration-none mb-2">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                        data;
                    }
                ?>

                <br>
                <a href="<?php echo $contact_r['insta']?>" class="d-inline-block text-dark tex-decoration-none mb-2">
                    <i class="bi bi-instagram"></i> Instagram
                </a><br>
                <a href="<?php echo $contact_r['fb']?>" class="d-inline-block text-dark tex-decoration-none">
                    <i class="bi bi-facebook"></i> Facebook
                </a><br>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-dark text-white p-3 m-0">Design and Developed by GJG</h6>

    <script src="assets/js/bootstrap/bootsrap.bundle.min.js"></script>

    <script>
        function setActive(){
            let navbar = document.getElementById('nav-bar');
            let a_tags = navbar.getElementsByTagName('a');

            for(let i = 0; i < a_tags.length; i++){
                let file = a_tags[i].href.split('/').pop();
                let file_name = file.split('.')[0];

                if(document.location.href.indexOf(file_name) >= 0){
                    a_tags[i].classList.add('active');
                }
            }
        }

        let register_form = document.getElementById('register-form');

        register_form.addEventListener('submit',(e)=>{
            e.preventDefault();
            
            let data = new FormData();

            data.append('name',register_form.elements['name'].value);
            data.append('email',register_form.elements['email'].value);
            data.append('phonenum',register_form.elements['phonenum'].value);
            data.append('address',register_form.elements['address'].value);
            data.append('pincode',register_form.elements['pincode'].value);
            data.append('dob',register_form.elements['dob'].value);
            data.append('pass',register_form.elements['pass'].value);
            data.append('cpass',register_form.elements['cpass'].value);
            data.append('profile',register_form.elements['profile'].files[0]);
            data.append('register', '');

            var myYModa = document.getElementById('registerModal');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);

            xhr.onload = function(){            
               
            }   
            xhr.send('data');
        });

    setActive();
 
    </script>