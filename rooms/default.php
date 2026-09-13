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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Explore our cozy and comfortable rooms at Dorsen Homestay. Your perfect choice in Shillong for a relaxing stay. Check out our accommodations and book your room today." />
    <title>Our Rooms - Dorsen Homestay</title>
    <link rel="icon" sizes="1931x1931" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon.png" type="image/png">
    <link rel="icon" sizes="48x48" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon-48x48.png" type="image/png">
    <link rel="apple-touch-icon" sizes="1931x1931" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon.png" type="image/png">
    <link rel="apple-touch-icon" sizes="48x48" href="https://dorsenhomestay.com/res/media/logo/dorsen-homestay-favicon-48x48.png" type="image/png">
    <link rel="stylesheet" href="https://dorsenhomestay.com/res/css/main.css?v=5.6">
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
                        <a href="https://dorsenhomestay.com/rooms" class="active-nav-item">Rooms</a>
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
                        <a href="https://dorsenhomestay.com">Home</a>
                        <a href="https://dorsenhomestay.com/rooms" class="active-nav-item">Rooms</a>
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
    <section class="page-title-section">
        <h2 class="font-secondary">Our Rooms</h2>
        <p>Home > Rooms</p>
    </section>
    
    <section class="bg-white" id="room-1">
        <div class="room-container container">
            <div class="room-gallery">
                <img src="https://dorsenhomestay.com/res/media/uploads/room_1_1.jpg" id="room-1-expandedImg" style="width:100%">
                <div class="images">
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_1_1.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-1');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_1_2.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-1');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_1_3.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-1');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_1_4.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe wash room" onclick="expandImageFunc(this, 'room-1');">
                    </div>
                </div>
            </div>
            <div class="room-description">
                <h3 class="room-title">1. Deluxe Room</h3>
                <p>
                    Experience the epitome of comfort and relaxation in our Deluxe Room. This well-appointed room is tailored for couples and solo travelers seeking a tranquil retreat. Relax in style with a spacious layout, a plush King-sized bed, and the added charm of a private balcony to savor those tranquil moments.
                </p>
                <ul class="amenities">
                    <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">4000</span>/ NIGHT</li>
                    <li class="item"><span class="material-symbols-outlined">bed</span>1 King Sized Bed</li>
                    <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                    <li class="item"><span class="material-symbols-outlined">balcony</span>Attached Verandah</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="bg-light" id="room-2">
        <div class="room-container room-container-row-reverse container">
            <div class="room-gallery">
                <img src="https://dorsenhomestay.com/res/media/uploads/room_2_1.jpg" id="room-2-expandedImg" style="width:100%">
                <div class="images">
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_2_1.jpg" style="width:100%" loading="lazy" alt="dorsen homestay semi deluxe room" onclick="expandImageFunc(this, 'room-2');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_2_2.jpg" style="width:100%" loading="lazy" alt="dorsen homestay semi deluxe room" onclick="expandImageFunc(this, 'room-2');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_2_3.jpg" style="width:100%" loading="lazy" alt="dorsen homestay semi deluxe room" onclick="expandImageFunc(this, 'room-2');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_2_4.jpg" style="width:100%" loading="lazy" alt="dorsen homestay semi deluxe wash room" onclick="expandImageFunc(this, 'room-2');">
                    </div>
                </div>
            </div>
            <div class="room-description">
                <h3 class="room-title">2. Semi Deluxe Room</h3>
                <p>
                    Our Semi-Deluxe Room is your affordable choice for a cozy stay. Ideal for budget-conscious travelers, it features comfortable Queen-sized bed, a functional private bathroom and a private balcony for moments of relaxation.
                </p>
                <ul class="amenities">
                    <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">3000</span>/ NIGHT</li>
                    <li class="item"><span class="material-symbols-outlined">bed</span>1 Queen Sized Bed</li>
                    <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                    <li class="item"><span class="material-symbols-outlined">balcony</span>Attached Verandah</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="bg-white" id="room-3">
        <div class="room-container container">
            <div class="room-gallery">
                <img src="https://dorsenhomestay.com/res/media/uploads/room_3_1.jpg" id="room-3-expandedImg" style="width:100%">
                <div class="images">
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_3_1.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-3');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_3_2.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-3');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_3_3.jpg" style="width:100%" loading="lazy" alt="dorsen homestay balcony" onclick="expandImageFunc(this, 'room-3');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_3_4.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe wash room" onclick="expandImageFunc(this, 'room-3');">
                    </div>
                </div>
            </div>
            <div class="room-description">
                <h3 class="room-title">3. Deluxe Room</h3>
                <p>
                    Our Deluxe Room is a haven of tranquility and style. Whether you're traveling as a couple or solo, you'll appreciate the spacious design, a sumptuous King-sized bed, and your very own private balcony for moments of serenity.
                </p>
                <ul class="amenities">
                    <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">4000</span>/ NIGHT</li>
                    <li class="item"><span class="material-symbols-outlined">bed</span>1 King Sized Bed</li>
                    <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                    <li class="item"><span class="material-symbols-outlined">balcony</span>Attached Verandah</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="bg-light" id="room-4">
        <div class="room-container room-container-row-reverse container">
            <div class="room-gallery">
                <img src="https://dorsenhomestay.com/res/media/uploads/room_4_1.jpg" id="room-4-expandedImg" style="width:100%">
                <div class="images">
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_4_1.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-4');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_4_2.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-4');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_4_3.jpg" style="width:100%" loading="lazy" alt="dorsen homestay balcony" onclick="expandImageFunc(this, 'room-4');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_4_4.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe wash room" onclick="expandImageFunc(this, 'room-4');">
                    </div>
                </div>
            </div>
            <div class="room-description">
                <h3 class="room-title">4. Deluxe Room</h3>
                <p>
                    Discover a sanctuary of comfort in our Deluxe Room. Tailored for couples and solo adventurers, it offers a spacious interior, a cozy King-sized bed, and a private balcony to soak in the natural beauty of Shillong.
                </p>
                <ul class="amenities">
                    <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">4000</span>/ NIGHT</li>
                    <li class="item"><span class="material-symbols-outlined">bed</span>1 King Sized Bed</li>
                    <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                    <li class="item"><span class="material-symbols-outlined">balcony</span>Attached Verandah</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="bg-white" id="room-5">
        <div class="room-container container">
            <div class="room-gallery">
                <img src="https://dorsenhomestay.com/res/media/uploads/room_5_1.jpg" id="room-5-expandedImg" style="width:100%">
                <div class="images">
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_5_1.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-5');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_5_2.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-5');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_5_3.jpg" style="width:100%" loading="lazy" alt="dorsen homestay balcony" onclick="expandImageFunc(this, 'room-5');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_5_4.jpg" style="width:100%" loading="lazy" alt="dorsen homestay balcony" onclick="expandImageFunc(this, 'room-5');">
                    </div>
                </div>
            </div>
            <div class="room-description">
                <h3 class="room-title">5. Semi Deluxe Room</h3>
                <p>
                    Our Semi-Deluxe Room is tailored for those who seek affordability without compromising comfort. With a comfortable Queen-sized bed and a private balcony, you can enjoy the serenity of Shillong.
                </p>
                <ul class="amenities">
                    <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">3000</span>/ NIGHT</li>
                    <li class="item"><span class="material-symbols-outlined">bed</span>1 Queen Sized Bed</li>
                    <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                    <li class="item"><span class="material-symbols-outlined">balcony</span>Attached Verandah</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="bg-light" id="room-6">
        <div class="room-container room-container-row-reverse container">
            <div class="room-gallery">
                <img src="https://dorsenhomestay.com/res/media/uploads/room_6_1.jpg" id="room-6-expandedImg" style="width:100%">
                <div class="images">
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_6_1.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-6');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_6_2.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-6');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_6_3.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-6');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_6_4.jpg" style="width:100%" loading="lazy" alt="dorsen homestay balcony" onclick="expandImageFunc(this, 'room-6');">
                    </div>
                </div>
            </div>
            <div class="room-description">
                <h3 class="room-title">6. Deluxe Room</h3>
                <p>
                    Unwind in style in our Deluxe Room, where comfort meets elegance. This room is perfect for couples and solo travelers. Enjoy the generous space, a plush King-sized bed, and a private balcony to cherish those quiet moments.
                </p>
                <ul class="amenities">
                    <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">4000</span>/ NIGHT</li>
                    <li class="item"><span class="material-symbols-outlined">bed</span>1 King Sized Bed</li>
                    <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                    <li class="item"><span class="material-symbols-outlined">balcony</span>Attached Verandah</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section class="bg-white" id="room-7">
        <div class="room-container container">
            <div class="room-gallery">
                <img src="https://dorsenhomestay.com/res/media/uploads/room_7_1.jpg" id="room-7-expandedImg" style="width:100%">
                <div class="images">
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_7_1.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-7');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_7_2.jpg" style="width:100%" loading="lazy" alt="dorsen homestay deluxe room" loading="lazy" alt="dorsen homestay deluxe room" onclick="expandImageFunc(this, 'room-7');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_7_3.jpg" style="width:100%" loading="lazy" alt="dorsen homestay balcony" onclick="expandImageFunc(this, 'room-7');">
                    </div>
                    <div>
                        <img src="https://dorsenhomestay.com/res/media/uploads/room_7_4.jpg" style="width:100%" loading="lazy" alt="dorsen homestay wash room" onclick="expandImageFunc(this, 'room-7');">
                    </div>
                </div>
            </div>
            <div class="room-description">
                <h3 class="room-title">7. Semi Deluxe Room</h3>
                <p>
                    For the budget-conscious traveler, our Affordable Semi-Deluxe Room is the perfect choice. It features a comfortable Queen-sized bed and a private balcony for moments of relaxation. 
                </p>
                <ul class="amenities">
                    <li class="item"><span class="material-symbols-outlined">currency_rupee</span><span class="price">2700</span>/ NIGHT</li>
                    <li class="item"><span class="material-symbols-outlined">bed</span>1 Queen Sized Bed</li>
                    <li class="item"><span class="material-symbols-outlined">group</span>2 Person</li>
                    <li class="item"><span class="material-symbols-outlined">balcony</span>Attached Verandah</li>
                </ul>
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
