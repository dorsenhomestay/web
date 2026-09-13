<?php
    // ERROR REPORTING
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    // Start the session
    session_start();
    
    // Check if the token is not already set in the session
    if (!isset($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = md5(uniqid(mt_rand(), true));
        
    function verify_csrf_token($csrf_token) {
        if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $csrf_token) {
            // Valid token, remove it to ensure it can only be used once
            unset($_SESSION['csrf_token']);
            return true;
        }
        return false;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="robots" content="noindex" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Contact us for any enquiry about Dorsen Homestay" />
    <meta name="keywords" content="homestay, accommodation, travel, hospitality, rooms, shillong, meghalaya" />
    <title>Contact - Dorsen Homestay</title>
    <link rel="icon" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://dorsenhomestay.com/res/css/main.css?v=5.5" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  </head>
  <body>
    <header class="" id="my-header">
            <div class="header-container">
                <div class="brand">
                    <a href="https://dorsenhomestay.com">
                        <img src="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-accent-dark.svg" alt="Dorsen Homestay Logo">
                    </a>
                </div>
                <div class="navigation">
                    <nav>
                        <a href="https://dorsenhomestay.com">Home</a>
                        <a href="https://dorsenhomestay.com/rooms">Rooms</a>
                        <a href="https://dorsenhomestay.com/contact" class="active-nav-item">Contact</a>
                    </nav>
                </div>
                <div class="click-to-action">
                    <div class="hamburger-menu">
                        <label for="menu-check">
                            <input type="checkbox" id="menu-check"/> 
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="hide-menu" id="slide-menu">
                <div class="menu-container">
                    <hr>
                    <nav class="navigation">
                        <a href="https://dorsenhomestay.com">Home</a>
                        <a href="https://dorsenhomestay.com/rooms">Rooms</a>
                        <a href="https://dorsenhomestay.com/contact" class="active-nav-item">Contact</a>
                        <button class="open-book-your-stay light-button">Book Your Stay <span class="material-symbols-outlined"> chevron_right </span> </button>
                    </nav>
                    <div>
                        <h1>Dorsen Homestay</h1>
                        <p>Experience comfort and local hospitality with our curated homestay accommodations. Your perfect getaway starts here.</p>
                    </div>
                    <div>
                        <h1>Reach Us At</h1>
                        <nav class="contact">
                            <a href="mailto:dorsenhomestay@gmail.com"><span class="material-symbols-outlined">mail</span> dorsenhomestay@gmail.com</a>
                            <a href="tel:+919863063286"><span class="material-symbols-outlined">call</span> +91 9863063286</a>
                            <a href="tel:+918730099269"><span class="material-symbols-outlined">call</span> +91 8730099269</a>
                            <a href="https://maps.app.goo.gl/6ywpPAWsqRFxk5k4A"><span class="material-symbols-outlined">location_on</span> Open in Google Maps</a> (4.4 km from Center)
                        </nav>
                        <p>Umshing Umjapung, behind Umshing Presbyterian Church, Meghalaya, India - 793022</p>
                    </div>
                    <hr>
                </div>
            </div>
        </header>
    <section class="page-title-section">
        <h2 class="font-secondary">Contact Us</h2>
        <p>Home > Contact</p>
    </section>
    
    <style>
        /*----------------------------------FOOTER----------------------------------*/
        
        .contact-section { display: flex; align-items: start; justify-content: space-between; gap: 3rem; }
        .contact-section .column { display: flex; align-items: start; justify-content: center; flex-direction: column; gap: 3rem; }
        .contact-section .item { display: flex; align-items: start; justify-content: space-between; flex-direction: column; gap: 2rem }
        .contact-section .item .title { display: flex; align-items: center; justify-content: center; gap: 1rem; font-size: 1.5rem; }
        .contact-section .item a { font-size: 1.2rem; font-weight: 600; color: var(--color-accent) !important; }
        .contact-section .contact-form { padding: 1rem; border-radius: 4px; }
        
        @media only screen and (max-width: 999px) {
            .contact-section  { flex-direction: column; padding: 5rem 1rem; }
        }
        
        @media only screen and (min-width: 1000px) {
            .contact-section  { flex-direction: row; padding: 5rem; }
        }
        /*----------------------------------FOOTER----------------------------------*/
    </style>
    
    <section class="bg-white">
        <div class="contact-section container">
            <div class="column">
                <h1>Kindly reach to us via</h1>
                <div class="item">
                    <div class="title"><span class="material-symbols-outlined">call</span> Phone Number</div>
                    <span><a href="tel:+919863063286">+91 9863063286</a> / <a href="tel:+918730099269">+91 8730099269</a></span>
                </div>
                <div class="item">
                    <div class="title"><span class="material-symbols-outlined">mail</span> Email</div>
                    <a href="mailto:dorsenhomestay@gmail.com">dorsenhomestay@gmail.com</a>
                </div>
            </div>
            <div class="column">
                <h1>Visit us on site</h1>
                <div class="item">
                    <div class="title"><span class="material-symbols-outlined">location_on</span> Address</div>
                    <p>Umshing Umjapung, behind Umshing Presbyterian Church, Meghalaya, India - 793022</p>
                    <div class="google-map-sm">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4474.041214086668!2d91.902428!3d25.605833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjXCsDM2JzIxLjAiTiA5McKwNTQnMDguNyJF!5e1!3m2!1sen!2sin!4v1697467953213!5m2!1sen!2sin" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="google-map-lg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4474.041214086668!2d91.902428!3d25.605833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjXCsDM2JzIxLjAiTiA5McKwNTQnMDguNyJF!5e1!3m2!1sen!2sin!4v1697467953213!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <hr>
        <p class="copyright">Copyright © 2023 - Dorsen Homestay</p>
    </footer>
    <script src="https://dorsenhomestay.com/res/js/index.js?v=5.0"></script>
  </body>
</html>
