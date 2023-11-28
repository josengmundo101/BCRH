<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butuan City Reservation Hub</title>
    <?php require('inc/links.php'); ?>



</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Illo debitis non repellendus quam suscipit <br>aliquam possimus fuga consequatur expedita sunt!
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe  class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.147159459913!2d125.5957578!3d8.9585847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3301eac565a4abe5%3A0x87859279e2e3f66a!2sCaraga%20State%20University!5e0!3m2!1sen!2sph!4v1701009406822!5m2!1sen!2sph" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Address</h5>
                    <a href="https://maps.app.goo.gl/8HPNzkB9WrD2Cn3J8" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-geo-alt-fill"></i>Ampayon, Butuan City, Agusan Del Norte
                    </a>

                    <h5 class="mt-4">Call us:</h5>
                    <a href="tel: +639092838350" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +639092838350
                    </a>
                    <br>
                    <a href="tel: +639099288025" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +639099288025
                    </a>

                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: josengmundosince2001@gmail.com" class="d-inline-block text-decoration-none text-dark">
                    <i class="bi bi-envelope-fill"></i> josengmundosince2001@gmail.com
                    </a>

                    <h5 class="mt-4">Follow us:</h5>
                    <a href="#" class="d-inline-block  text-dark fs-5 me-2">
                        <i class="bi bi-twitter me-1"></i> 
                    </a> 
                    <a href="#" class="d-inline-block  text-dark fs-5 me-2">
                        <i class="bi bi-instagram me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block  text-dark fs-5">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                     </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form >
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn text-white custom-bg mt-3">SEND</button>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="assets/js/bootstrap/bootstrap.js"></script>
    
    
</body>
</html>