<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,700&display=swap" rel="stylesheet">
    <!--Swiperjs Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!--BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Step Up Your Style</title>
    
    <link rel="icon" href="images\icons\webisite_logo.png" type="image/x">

    <style>
       .card {
        transition: transform 0.3s ease-in-out;
        }

        .card:hover {
        transform: scale(1.03);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>

<body>
    <!-- -------------------------------Navbar-------------------------------->
    <?php require 'navbar.php'; ?>

    <!-- -------------------------------Banner-------------------------------->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="images\banner\carosel (1).webp" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="images\banner\carosel (2).webp" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="images\banner\carosel (3).webp" alt="Third slide">
            </div>
        </div>
    </div>
    <!-- -------------------------------Cart-------------------------------->
    <h4 class="m-3 mt-5">Shop By Brand</h4>
    <div class="row m-1">
        <div class="col-sm-3">
          <div class="card shadow-sm">
            <img src="images\brand_images\shop-by-brand-1.jpg" class="img-fluid rounded" alt="Brand Image 1">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card shadow-sm">
            <img src="images\brand_images\shop-by-brand-2.jpg" class="img-fluid rounded" alt="Brand Image 2">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card shadow-sm">
            <img src="images\brand_images\shop-by-brand-3.jpg" class="img-fluid rounded" alt="Brand Image 3">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card shadow-sm">
            <img src="images\brand_images\shop-by-brand-4.jpeg" class="img-fluid rounded" alt="Brand Image 4">
          </div>
        </div>
      </div>
    <!-- -------------------------------why-------------------------------->
    <section class="py-2 py-md-3 mt-5" id="#why">
        <div class="container">
          <div class="row gy-3 gy-md-4 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5">
              <img class="img-fluid rounded" loading="lazy" src="images\about_image.jpg" style="height: 400px; width: 350px;" alt="About 1">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
              <h2 class="mb-2">Who Are We?</h2>
              <p class="lead fs-5 text-secondary mb-2">We're a vibrant community connecting sneaker enthusiasts to buy, sell, and showcase unique kicks.</p>
              <div class="row gy-4 gx-xxl-5">
                <div class="col-12 col-md-6">
                  <div class="d-flex">
                  <i class="bi bi-gear me-2"></i>
                    <div>
                      <h2 class="h5 mb-2">Our Mission</h2>
                      <p class="text-secondary mb-0">We deliver exceptional services, foster collaboration, and drive innovation.</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="d-flex">
                  <i class="bi bi-fire me-2"></i>
                    <div>
                      <h2 class="h5 mb-2">Our Goal</h2>
                      <p class="text-secondary mb-0">Empowering sneaker enthusiasts to thrive in a dynamic marketplace.</p>
                    </div>
                  </div>
                </div>
              </div>
              <a href="aboutus.php">
                <button type="button" class="btn btn-dark mt-5">Explore More</button>
              </a>
            </div>
          </div>
        </div>
      </section>

    <!-- -------------------------------contact-------------------------------->
    <div class="card m-5 shadow border border-1 border-muted" style="width: 73rem; height: 25rem;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="images\contactus.jpg" style="height:25rem; width:25rem;" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body me-3">
                <form action="php/contact.php" method="post" onsubmit="return validateForm()">
                    <div class="row">
                    <div class="col-12">
                        <label for="fullname" class="form-label mt-1">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" required>
                        
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label mt-2">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="" required>
                        
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="phone" class="form-label mt-2">Phone Number</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-telephone"></i>
                        </span>
                        <input type="tel" class="form-control" id="phno" name="phno" placeholder="Phone Number" value="">
                        
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <label for="message" class="form-label mt-2">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="message" name="msg" rows="3" placeholder="Message..." required></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                        <button class="btn btn-dark btn-lg mt-3" type="submit" value="Send">Send Message</button>
                        </div>
                    </div>
                    </div>
                </form>
                <script>
                    function validateForm() {
                        var nameInput = document.getElementById("name");
                        var emailInput = document.getElementById("email");
                        var phnoInput = document.getElementById("phno");
                        var msgInput = document.getElementById("message");
                    
                        var nameValue = nameInput.value.trim();
                        var emailValue = emailInput.value.trim();
                        var phnoValue = phnoInput.value.trim();
                        var msgValue = msgInput.value.trim();
                    
                        // Clear previous error messages
                        document.getElementById("name-error").innerHTML = "";
                        document.getElementById("email-error").innerHTML = "";
                        document.getElementById("phno-error").innerHTML = "";
                        document.getElementById("msg-error").innerHTML = "";
                    
                        // Validate name field
                        if (nameValue === "") {
                            document.getElementById("name-error").innerHTML = "Name is required";
                            nameInput.focus();
                            return false;
                        }
                    
                        // Validate email field
                        if (emailValue === "") {
                            document.getElementById("email-error").innerHTML = "Email is required";
                            emailInput.focus();
                            return false;
                        }
                    
                        // Validate phone number field
                        if (phnoValue === "") {
                            document.getElementById("phno-error").innerHTML = "Phone number is required";
                            phnoInput.focus();
                            return false;
                        }
                        if (phnoValue.length !== 10) {
                            document.getElementById("phno-error").innerHTML = "Phone number must be 10 digits";
                            phnoInput.focus();
                            return false;
                        }
                    
                        // Validate message field
                        if (msgValue === "") {
                            document.getElementById("msg-error").innerHTML = "Message is required";
                            msgInput.focus();
                            return false;
                        }
                    
                        return true; // Submit the form if all validations pass
                    }
                    </script>
            </div>
          </div>
        </div>
    </div>

    <!----------------------------------Our testimonials-------------------------------->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimonials</h2>
        <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">
            <div class="swiper-slide bg-white p-3">
                <div class="profile d-flex align-items-center mb-2">
                <i class="bi bi-quote fs-1"></i>
                
                </div>
                <h5 class="m-0 mb-2">Akshat</h5>
                <p>
                I had a great experience with these guys. Their team helped me find the 
                perfect pair as per my liking, and they made my overall experience very smooth. Thanks!
                </p>
                
            </div>
            <div class="swiper-slide bg-white p-3">
                <div class="profile d-flex align-items-center mb-3">
                <i class="bi bi-quote fs-1"></i>
                </div>
                <h5 class="m-0 mb-2">Jay</h5>
                <p>
                I have been following these guys on Instagram, and have always wanted to buy a pair myself. They do these weekly drops and I highly suggest-you also follow them on Instagram. 
                I copped my first ever Nike's at a very affordable price.
                </p>
                
            </div>
            <div class="swiper-slide bg-white p-3">
                <div class="profile d-flex align-items-center mb-3">
                    <i class="bi bi-quote fs-1"></i>
                </div>
                <h5 class="m-0 ms-2">Rahul Gupta</h5>
                <p>
                Had a little rough experience, when they couldn't ship my pair due to 
                seller operational issues. Their team called me and explained me the whole 
                situation, asking for my patience and today, I finally got the pair that I 
                wanted from so long. I appreciate the support. Would recommend 10/10.
                </p>
                
            </div>
            <div class="swiper-slide bg-white p-3">
                <div class="profile d-flex align-items-center mb-3">
                    <i class="bi bi-quote fs-1"></i>
                </div>
                <h5 class="m-0 ms-2">Aaryan Singla </h5>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores earum animi 
                vel commodi odit voluptatem at voluptatibus laborum quis rem.
                </p>
                
            </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        
        </div>
    <!--------------------------------Our testimonials------------------------------>

    <!-- -------------------------------footer-------------------------------->
  
    <?php require 'footer.php'; ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
  var carousel = document.querySelector('#carouselExampleSlidesOnly');
  var carousel = new bootstrap.Carousel(carousel);
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView:"3",
      loop:true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640:{
          slidesPerView:1,
        },
        768:{
          slidesPerView:2,
        },
        1024:{
          slidesPerView:3,
        },
      }
    });
  </script>



</body>

</html>