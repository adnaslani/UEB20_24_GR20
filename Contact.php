<?php
include('includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->



    <style>

html {
  overflow-x: hidden;
}



body {
  background: #eee;

}

section {
    padding:3rem 2rem;
    margin: 0 auto;
    max-width: 1100px;
  }

.contact {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    gap: 2rem;
  }
  
  .contact form {
    -webkit-box-flex: 1;
        -ms-flex: 1 1 42rem;
            flex: 1 1 42rem;
  }
  
  .contact form h3 {
    font-size: 3rem;
    text-transform: uppercase;
    color: #000000;
    padding-bottom: 1rem;
  }
  
  .contact form p {
    text-transform: none;
    font-size: 1.5rem;
    color: #000000;
    padding: 1rem 0;
    line-height: 2;
  }
  
  .contact form .inputBox {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
  }

  .contact form .inputBox input {
    width: 49%;
  }
  
  .contact form .inputBox input, .contact form textarea {
    padding: 1.2rem 1.4rem;
    border-radius: .5rem;
    -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
    border: 0.2rem solid #333;
    background: #fff;
    text-transform: none;
    color: #666;
    font-size: 1.5rem;
    margin: .7rem 0;
  }
  
  .contact form textarea {
    height: 10rem;
    resize: none;
    width: 100%;
  }
  
  .contact .map {
    width: 100%;
    align-items: center;
}

.contact .map iframe {
    width: 100%;
    height: 300px; /* Përshtat sipas preferencave tuaja */
    border: none;
    position:center;
}

  iframe {
    height: 400px;
    width: 1000px;
  }

  
  .info-container .box-container {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: (minmax(2rem, 1fr))[auto-fit];
        grid-template-columns: repeat(auto-fit, minmax(2rem, 1fr));
    gap: 2rem;
  }
  
  .info-container .box-container .box {
    
    background: #fff;
    border-radius: .5rem;
    text-align: center;
    padding: 2rem;
    border: 0.2rem solid #333;
    -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
  }
  
  .info-container .box-container .box i {
    height: 7.5rem;
    width: 7.5rem;
    line-height: 7.5rem;
    font-size: 2.5rem;
    border-radius: 50%;
    margin-bottom: .5rem;
    background: #0984e3;
    color: #fff;
  }
  
  .info-container .box-container .box h3 {
    font-size: 2rem;
    padding: .5rem 0;
    color: #333;
  }
  
  .info-container .box-container .box p {
    text-transform: none;

    font-size: 1.5rem;
    line-height: 2;
    color: #666;
  }
/* 

html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            min-height: 100%;
            margin-bottom: -100px; /* Set the height of your footer */
        /* }

        .content {
            padding-bottom: 100px; /* Set the height of your footer */
    
 
  
    </style>

</head>
<body>


<section class="info-container">
    <div class="box-container">
        <div class="box">
            <i class="fas fa-map"></i>
            <h3>Address</h3>
            <p>Kosovo, Prishtina - 10000</p>
        </div>
        <div class="box">
            <i class="fas fa-envelope"></i>
            <h3>Email</h3>
            <p>group20@student.uni-pr.edu</p>
        </div>
        <div class="box">
            <i class="fas fa-phone"></i>
            <h3>Number</h3>
            <p>+383 49 123 553</p>
            <p>+383 49 667 321</p>
        </div>
    </div>
</section>


<section class="contact-map-container">
    <div class="contact">
        <form action="" draggable="true" ondragstart="dragStart(event)" ondragover="dragOver(event)" ondrop="drop(event)">
            <h3>Get in touch</h3>
            <p>Welcome to our contact page! We value your feedback and inquiries. Whether you have questions about our services, want to collaborate, or simply want to say hello, we'd love to hear from you. Please fill out the form below and let us know how we can assist you. Your thoughts are important to us, and we'll get back to you as soon as possible. Thank you for reaching out!</p>
            <div class="inputBox">
                <input type="text" placeholder="Your name">
                <input type="email" placeholder="Your email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="Your number">
                <input type="text" placeholder="Subject">
            </div>
            <textarea name="" placeholder="Your message (you can drag and drop your file here.)" id="message" cols="30" rows="10" ondrop="drop(event)" ondragover="allowDrop(event)"></textarea>
            <input type="submit" value="Send message" class="btn">
        </form>
    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5869.1671474183695!2d21.16790759907349!3d42.64898732891491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ec1b6ecb2c1%3A0x7f0893730efce187!2sFakulteti%20Teknik!5e0!3m2!1sbs!2s!4v1704759022779!5m2!1sbs!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alphal/is/bootstrap.min.js"integrity="sha384-oes162h0Lfzrys4LxRF630JCXdXDipiYWBnVT19Y9/TRIw5x1KIEHpNyvvDShgf/"crossorigin= "anonymous"> </script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php include('includes/footer.php'); ?>
</body>
</html>
