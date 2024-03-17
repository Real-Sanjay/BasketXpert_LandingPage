<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BasketXpert</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="favi.jpeg" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
  </head>
 
  <body>
    <!-- Navbar Section -->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="#home" id="navbar__logo">BasketXpert</a>
        <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span> 
            <span class="bar"></span>
            <span class="bar"></span>
            
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="#home" class="navbar__links" id="home-page">Home</a>
          </li>
          <li class="navbar__item">
            <a href="#about" class="navbar__links" id="about-page">About</a>
          </li>
          <li class="navbar__item">
            <a href="#services" class="navbar__links" id="services-page"
              >Services</a
            >
          </li>
          <li class="navbar__btn">
            <a href="logout.php" class="button" id="signup">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" id="home">
      <div class="hero__container">
        
        <h1 class="hero__heading">Welcome to <span>BasketXpert</span></h1>
        <p class="hero__description"><span class="username"><?php echo $_SESSION['user_name'] ?></span></p>
        <button class="main__btn"><a href="https://basketxpert.streamlit.app/">Start</a></button>
      </div>
    </div>

    <!-- About Section -->
    <div class="main" id="about">
      <div class="main__container">
        <div class="main__img--container">
          <div class="main__img--card"><i class="fas fa-layer-group"></i></div>
        </div>
        <div class="main__content">
          <h1>What is BasketXpert?</h1>
          
          <p>The "BasketXpert" Market Basket Analysis Web Application is a standalone web-based software designed to empower businesses by providing insights from transactional data. It operates independently and does not require integration with external systems. The application's primary focus is on market basket analysis and visualization, enabling users to perform in-depth analysis without reliance on external components.</p>
          <button class="main__btn"><a href="mailto:contact@sanjaydh.com">Contact us</a></button>

        </div>
      </div>
    </div>

    <!-- Services Section -->
    <div class="services" id="services">
      <h1>Our Services</h1>
      <div class="services__wrapper">
        <div class="services__card">
          <h2>Market Basket Analysis</h2>
          <p>Absolutely Free</p>
          <div class="services__btn"><button>Available</button></div>
        </div>
        <div class="services__card">
            <h2>Application development(Web, Mobile, Desktop, Saas..) </h2>
            <p>Charges Apply</p>
            <div class="services__btn"><button>Available</button></div>
          </div>
        <div class="services__card">
          <h2>Customer Segmentation </h2>
          <p>Absolutely Free</p>
          <a href="#" class="services__btn"><button>Coming Soon</button></a>
        </div>
        
        <div class="services__card">
          <h2>Sentiment Analysis (Natural Language Processing)</h2>
          <p>Charges Apply</p>
          <div class="services__btn"><button>Coming Soon</button></div>
        </div>
      </div>
    </div>

    <!-- Features Section -->
    <div class="main" id="sign-up">
      <div class="main__container">
        <div class="main__content">
          <h1>Join Our Team</h1>
          <h2>Want to work at BasketXpert?</h2>
          <p>mail your resume below</p>
          <button class="main__btn"><a href="mailto:sanjaydh006@gmail.com">Email</a></button>
        </div>
        <div class="main__img--container">
          <div class="main__img--card" id="card-2">
            <i class="fas fa-users"></i>
          </div>
        </div>
      </div>
    </div>

     <!-- Footer Section -->
     <div class="footer__container">
      <div class="footer__links">
        <div class="footer__link--wrapper">
          <div class="footer__link--items">
            <h2>About Us</h2>
            <a href="https://drive.google.com/file/d/13bEqHEHlpzV4zh5ylZ0tLAJx1QH_If_f/view">How it works</a> <a href="https://www.wonder.legal/in/modele/privacy-policy-website-mobile-application-in">Terms of Service</a>
            <a href="mailto:sanjaydh006@gmail.com">Careers</a> <a href="https://www.inventuslaw.com/introduction-to-data-privacy-laws-in-india/">Privacy</a>
          </div>
          <div class="footer__link--items">
            <h2>Contact Us</h2>
            <a href="https://www.sanjaydh.com/">Contact</a> <a href="https://www.bhimupi.org.in/">Support</a>
            <!-- <a href="/">Destinations</a> -->
          </div>
        </div>
        <div class="footer__link--wrapper">
          <!-- <div class="footer__link--items">
            <h2>Videos</h2>
            <a href="/">Submit Video</a> <a href="/">Ambassadors</a>
            <a href="/">Agency</a>
          </div> -->
          <div class="footer__link--items">
            <h2>Social Media</h2>
            <a href="https://www.instagram.com/its.sanjay005/">Instagram</a> <a href="https://www.facebook.com/profile.php?id=100008848428273">Facebook</a>
            <a href="https://github.com/Real-Sanjay/BasketXpert">GitHub</a> <a href="https://twitter.com/RealSanjay007">Twitter</a>
          </div>
        </div>
      </div>
      <section class="social__media">
        <div class="social__media--wrap">
          <div class="footer__logo">
            <a href="/" id="footer__logo">BasketXpert</a>
          </div>
          <p class="website__rights">© BasketXpert 2024. All rights reserved</p>
          <div class="social__icons">
            <a href="https://www.facebook.com/profile.php?id=100008848428273" class="social__icon--link" target="_blank"
              ><i class="fab fa-facebook"></i
            ></a>
            <a href="https://www.instagram.com/its.sanjay005/" class="social__icon--link"
              ><i class="fab fa-instagram"></i
            ></a>
            <a href="https://youtube.com" class="social__icon--link"
              ><i class="fab fa-youtube"></i
            ></a>
            <a href="https://www.linkedin.com/in/its-sanjay/" class="social__icon--link"
              ><i class="fab fa-linkedin"></i
            ></a>
            <a href="https://twitter.com/RealSanjay007" class="social__icon--link"
              ><i class="fab fa-twitter"></i
            ></a>
          </div>
        </div>
      </section>
    </div>

    <script src="app.js"></script>
  </body>
</html>