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
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $checkinDate = $_POST['date'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $csrf_token = $_POST['csrf_token'];
    
        if (!empty($csrf_token) && verify_csrf_token($csrf_token)) {
            // CSRF token is valid, process the form data
    
            // Send an email
            $to = "dorsenhomestay@gmail.com";
            $subject = "New Booking";
    
            $header = "From: booking@dorsenhomestay.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
    
            $body = "<h1>Booking Details</h1>";
            $body .= "<p>Name: " . $name . "</p>";
            $body .= "<p>Expected Check-in: " . $checkinDate . "</p>";
            $body .= "<p>Email: " . $email . "</p>";
            $body .= "<p>Phone: " . $phone . "</p>";
            $body .= "<p>Message: " . $message . "</p>";
            $body .= "<p>Form submitted on: " . date("Y-m-d") . "</p>";
    
            $retval = mail($to, $subject, $body, $header);
    
            if ($retval == true) {
                // After processing and sending the email, you can redirect to a thank you page.
                header('Location: https://dorsenhomestay.com/thank-you');
                exit;
            } else {
                header('Location: https://dorsenhomestay.com/error');
                exit;
            }
        } else {
            // CSRF token is invalid, redirect to an error page.
            header('Location: https://dorsenhomestay.com/error');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Discover the essence of comfort and culture at Dorsen Homestay. Your home away from home in Shillong, offering warm hospitality, scenic surroundings, and local experiences. Book your stay today and embark on a memorable journey.">
        <title>Dorsen Homestay</title>
        <link rel="icon" sizes="1931x1931" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon.png" type="image/png">
        <link rel="icon" sizes="48x48" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon-48x48.png" type="image/png">
        <link rel="apple-touch-icon" sizes="1931x1931" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon.png" type="image/png">
        <link rel="apple-touch-icon" sizes="48x48" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon-48x48.png" type="image/png">
        <link rel="stylesheet" href="https://dorsenhomestay.com/res/css/main.css?v=5.8">
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
                        <a href="https://dorsenhomestay.com" class="active-nav-item">Home</a>
                        <a href="https://dorsenhomestay.com/rooms">Rooms</a>
                        <a href="https://dorsenhomestay.com/contact">Contact</a>
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
                        <a href="https://dorsenhomestay.com" class="active-nav-item">Home</a>
                        <a href="https://dorsenhomestay.com/rooms">Rooms</a>
                        <a href="https://dorsenhomestay.com/contact">Contact</a>
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
        <style>
            .dorsen-hero-image {background: transparent url("https://dorsenhomestay.com/res/media/uploads/common_area_1.jpg") no-repeat center center / cover;}
        </style>
        <section class="hero dorsen-hero-image">
            <div class="hero-text-slider">
                <div class="text-slide-1">
                    <h1>Your Dream Getaway </h1>
                    <p>A Place Where Warmth Meets Comfort</p>
                </div>
                <div class="text-slide-2">
                    <h2>Embrace Cozy Elegance</h2>
                    <p>Create Lasting Memories in Our Serene Retreat</p>
                </div>
                <div class="text-slide-3">
                    <h2>Escape the Ordinary</h2>
                    <p>Your Gateway to Relaxation and Renewal</p>
                </div>
            </div>
        </section>
        <section>
            <div class="container welcome-section">
                <div class="message">
                    <div class="section-title"><span class="leading-line"></span>Welcome to</div>
                    <h1 class="font-accent">Dorsen Homestay</h1>
                    <p>
                        Nestled in the picturesque Shillong, Dorsen Homestay offers a tranquil escape from the hustle and bustle of everyday life.
                        <br>
                        <br>
                        Our homestay boasts a selection of beautifully appointed rooms designed to provide the utmost comfort and relaxation.
                        <br>
                        <br>
                        With a dedicated team committed to ensuring your every need is met, Dorsen Homestay promises a memorable and rejuvenating experience for all our guests.
                    </p>
                </div>
                <div class="display-image"></div>
            </div>
        </section>
        <section class="bg-white">
            <div class="container explore-rooms">
                <div class="section-title"><span class="leading-line"></span>Explore</div>
                <h2 class="font-secondary">Our Rooms</h2>
                <div class="room-container">
                    <div class="room">
                        <a href="https://dorsenhomestay.com/rooms/#room-1">
                            <div class="room-image" style="background: url('https://dorsenhomestay.com/res/media/uploads/room_1_1.jpg') no-repeat center center / cover;"></div>
                            <h3 class="room-title">1. Deluxe Room</h3>
                            <ul class="amenities">
                                <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">4000</span>/ NIGHT</li>
                                <li class="item"><span class="material-symbols-outlined">bed</span>1 King Size Bed</li>
                                <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                            </ul>
                        </a>
                    </div>
                    <div class="room">
                        <a href="https://dorsenhomestay.com/rooms/#room-2">
                            <div class="room-image" style="background: url('https://dorsenhomestay.com/res/media/uploads/room_2_1.jpg') no-repeat center center / cover;"></div>
                            <h3 class="room-title">2. Semi Deluxe Room</h3>
                            <ul class="amenities">
                                <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">3000</span>/ NIGHT</li>
                                <li class="item"><span class="material-symbols-outlined">bed</span>1 Queen Size Bed</li>
                                <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                            </ul>
                        </a>
                    </div>
                    <div class="room">
                        <a href="https://dorsenhomestay.com/rooms/#room-3">
                            <div class="room-image" style="background: url('https://dorsenhomestay.com/res/media/uploads/room_3_1.jpg') no-repeat center center / cover;"></div>
                            <h3 class="room-title">3. Deluxe Room</h3>
                            <ul class="amenities">
                                <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">4000</span>/ NIGHT</li>
                                <li class="item"><span class="material-symbols-outlined">bed</span>1 King Size Bed</li>
                                <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                            </ul>
                        </a>
                    </div>
                    <div class="room">
                        <a href="https://dorsenhomestay.com/rooms/#room-4">
                            <div class="room-image" style="background: url('https://dorsenhomestay.com/res/media/uploads/room_4_1.jpg') no-repeat center center / cover;"></div>
                            <h3 class="room-title">4. Deluxe Room</h3>
                            <ul class="amenities">
                                <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">4000</span>/ NIGHT</li>
                                <li class="item"><span class="material-symbols-outlined">bed</span>1 King Size Bed</li>
                                <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                            </ul>
                        </a>
                    </div>
                </div>
                <div class>
                    <a href="https://dorsenhomestay.com/rooms"><button class="light-button">Explore More Rooms <span class="material-symbols-outlined">chevron_right</span></button></a>
                </div>
            </div>
        </section>
        <section class="services-container container" id="facilities">
            <div class="services-section">
                <div>
                    <div class="service-image" style="background: url('https://dorsenhomestay.com/res/media/uploads/bed-coffee.jpg') no-repeat center center / cover;"></div>
                </div>
                <div class="service-content">
                    <h2 class="font-secondary">Facilities & Services</h2>
                    <ul class="services-and-facilities">
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">airport_shuttle</span>
                            Airport Shuttle
                        </li>
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">room_service</span>
                            Room Service
                        </li>
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">local_cafe</span>
                            Bed & Breakfast
                        </li>
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">wifi</span>
                            wifi
                        </li>
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">tv</span>
                            Room TV
                        </li>
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">balcony</span>
                            Balcony
                        </li>
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">local_taxi</span>
                            Driver's Room
                        </li>
                        <li class="item">
                            <span class="material-symbols-outlined color-accent">local_parking</span>
                            Parking Space
                        </li>
                    </ul>
                </div>
            </div>
            <div class="services-section pt-lg-3">
                <div class="facility-details">
                    <h3 class="topic"><span class="material-symbols-outlined color-accent">concierge</span> Front Desk Service</h3>
                    <ul>
                        <li>* Check-in/Check-out Efficiency: Swift and hassle-free check-in and check-out procedures for a seamless guest experience.</li>
                        <li>* 24/7 Availability: Round-the-clock front desk service to address guest needs at any time</li>
                        <li>* Guest Information: Providing guests with information about local attractions, dining options, and activities, as well as answering any questions they may have.</li>
                    </ul>
                </div>
                <div class="facility-details">
                    <h3 class="topic"><span class="material-symbols-outlined color-accent">clean_hands</span> Cleanliness</h3>
                    <ul>
                        <li>* Rigorous cleaning protocols with enhanced disinfection of high-touch surfaces.</li>
                        <li>* Freshly laundered linens and towels for every guest.</li>
                        <li>* Housekeeping staff trained to follow strict hygiene and safety guidelines.</li>
                        <li>* Regular sanitation of common areas and frequently touched surfaces.</li>
                    </ul>
                </div>
            </div>
            <div class="services-section pt-lg-3">
                <div class="facility-details">
                    <h3 class="topic"><span class="material-symbols-outlined color-accent">health_and_safety</span> Food and Drink Safety</h3>
                    <ul>
                        <li>* Safe food handling practices in the kitchen.</li>
                        <li>* Contactless dining options, including room service or outdoor dining areas.</li>
                        <li>* Special dietary accommodations available upon request.</li>
                        <li>* Regular inspections and compliance with food safety standards.</li>
                    </ul>
                </div>
                <div class="facility-details">
                    <h3 class="topic"><span class="material-symbols-outlined color-accent">security</span> Security</h3>
                    <ul>
                        <li>* Secure parking facilities for guests' vehicles.</li>
                        <li>* Lockable rooms or safes for storing valuable belongings.</li>
                        <li>* Well-lit pathways and entrances to ensure guest safety at all times.</li>
                        <li>* Emergency procedures and contact information readily available for guests.</li>
                    </ul>
                </div>
            </div>
        </section>
        <style>
            
        </style>
        <section class="bg-white" id="policy">
            <div class="policy-section container">
                <div class="policies">
                    <h2 class="font-secondary">Our Policies</h2>
                    <div class="policy">
                        <h3>Timing Schedule</h3>
                        <div class="content">
                            <span>Check-In</span> <b class="color-accent">01:00 PM - 08:00 PM</b>
                        </div>
                        <div class="content">
                            <span>Check-Out</span> <b class="color-accent">07:00 AM - 12:00 AM</b>
                        </div>
                    </div>
                    <div class="policy">
                        <h3>Amendment</h3>
                        <p>* Smoking and the use of alcoholic beverages are not allowed anywhere on the premises.</p>
                        <p>* The tariff is subject to change as necessary.</p>
                        <p>* Pets are not permitted in the accommodation.</p>
                        <p>* Quiet hours are in effect from 10:00 PM to 7:00 AM to ensure a peaceful environment for all guests.</p>
                        <p>* All guests are expected to adhere to our cleanliness and hygiene standards during their stay.</p>
                        <p>* In the event of any damages to the property, guests will be held responsible for repair or replacement costs.</p>
                        <p>* Visitors or unregistered guests are not allowed in guest rooms without prior approval from the management.</p>
                        <p>* The homestay is not responsible for any loss or theft of personal belongings; secure storage options are available.</p>
                    </div>
                    <div class="policy">
                        <h3>Child Policy</h3>
                        <p>* Children of all age are welcome.</p>
                        <p>* Children 6 and above are considered adults at our property.</p>
                    </div>
                    <div class="policy">
                        <h3>Lunch & Dinner</h3>
                        <p>* Lunch and dinner available on orders in Local & Chinese Cuisine.</p>
                        <p>* Lunch order before 9 am.</p>
                        <p>* Dinner order before 6 pm.</p>
                    </div>
                    <div class="policy">
                        <h3>Driver's Room</h3>
                        <p>* Driver's room available with extra charges 600 / NIGHT, bed & breakfast included.</p>
                    </div>
                    <div class="policy">
                        <h3>Crib & Extra Bed Policy</h3>
                        <p>* No capacity for extra beds or crib.</p>
                    </div>
                </div>
                <div class="locate-me">
                    <h2 class="font-secondary">Locate Us</h2>
                    <p>Find Us on the Map</p>
                    <div class="google-map-sm">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4474.041214086668!2d91.902428!3d25.605833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjXCsDM2JzIxLjAiTiA5McKwNTQnMDguNyJF!5e1!3m2!1sen!2sin!4v1697467953213!5m2!1sen!2sin" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="google-map-lg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4474.041214086668!2d91.902428!3d25.605833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjXCsDM2JzIxLjAiTiA5McKwNTQnMDguNyJF!5e1!3m2!1sen!2sin!4v1697467953213!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer-section container">
                <div class="brand">
                    <img src="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-light.svg" alt="Dorsen Homestay Logo">
                </div>
                <div class="contact">
                    <h3 class="font-secondary">Address</h3>
                    <nav>
                        <p>Umshing Umjapung, behind Umshing Presbyterian Church, Meghalaya, India - 793022</p>
                    </nav>
                </div>
                <div class="contact">
                    <h3 class="font-secondary">Contact</h3>
                    <nav>
                        <a href="mailto:dorsenhomestay@gmail.com"><span class="material-symbols-outlined">mail</span> dorsenhomestay@gmail.com</a>
                        <a href="tel:+919863063286"><span class="material-symbols-outlined">call</span> +91 9863063286</a>
                        <a href="tel:+918730099269"><span class="material-symbols-outlined">call</span> +91 8730099269</a>
                    </nav>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright © 2023 - Dorsen Homestay</p>
        </footer>
        <section class="hide-book-your-stay" id="book-your-stay">
            <div id="close-book-your-stay">
                <span class="material-symbols-outlined">close</span>
            </div>
            <div class="head">
                <h1 class="title font-accent color-accent">Book Your Stay</h1>
                <span class="subtitle font-secondary">with us</span>
            </div>
            <div class="body">
                <p>Give us a call @ <b><a href="tel:+919863063286">+91 9863063286</a></b> / <b><a href="tel:+918730099269">+91 8730099269</a></b></p>
                <a href="tel:+919863063286"><button><span class="material-symbols-outlined">call</span> Call Now</button></a>
                <p><b>OR</b></p>
                <p>Fill your details below and book now</p>
                <form action="https://dorsenhomestay.com" class="booking-form" method="post">
                    <div class="input">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your full name.." required>    
                    </div>
                    <div class="input">
                        <label for="date">Expected Check-in Date</label>
                        <input type="date" id="date" name="date" value="" required /> 
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your email address.." required>    
                        </div>
                    <div class="input">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" placeholder="Your phone number.." required>    
                    </div>
                    <div class="text-area">
                        <label for="message">Message (optional)</label>
                        <textarea id="message" name="message" placeholder="Tell us what you have in mind.."></textarea> 
                    </div>
                    <input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">
                    <div class="submit-btn">  
                        <button type="submit" value="Submit"><span class="material-symbols-outlined">send</span> Book Now</button>
                    </div>
                    
                </form>
            </div>
        </section>
        <section class="sticky-click-to-action">
            <button class="open-book-your-stay">Book Your Stay <span class="material-symbols-outlined"> arrow_outward </span> </button>
        </section>
        <script src="https://dorsenhomestay.com/res/js/index.js?v=5.0"></script>
    </body>
</html>