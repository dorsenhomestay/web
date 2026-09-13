// VARIABLES
const myHeader = document.getElementById('my-header'); // Header
const hamburgerMenu =  document.getElementById('menu-check'); // Hamburger Menu
const slideMenu = document.getElementById('slide-menu'); // Sliding Menu
let prevScrollpos = window.pageYOffset; // Scroll Position

// WINDOW SCROLL ACTION
window.onscroll = function() { 
let currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos || hamburgerMenu.checked) {
    myHeader.classList.remove("hide-header");
  } else {
    myHeader.classList.add("hide-header");
  }
  prevScrollpos = currentScrollPos;
  
  if(window.pageYOffset < 400 && !hamburgerMenu.checked) {
      myHeader.classList.remove("light-header");
  } else {
      myHeader.classList.add("light-header");
  }
}

// HAMBURGER MENU CLICK EVENT
hamburgerMenu.addEventListener('click', function() {
  if (hamburgerMenu.checked) {
    slideMenu.classList.remove("hide-menu");
    myHeader.classList.add("light-header");
  } else {
    slideMenu.classList.add("hide-menu");
    if(window.pageYOffset < 400) {
      myHeader.classList.remove("light-header");
  }
  }
});

// ROOMS IMAGE GALLERY
function expandImageFunc(imgs, sectionId) {
    let expandImg = document.getElementById(sectionId + "-expandedImg");
    // let imgText = document.getElementById(sectionId + "-imgtext");
    expandImg.src = imgs.src;
    // imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}

// DEFAULT ON LOAD PAGE - SCROLL TO TOP
window.scrollTo(0, 0);

// TOUR AUTO-SCROLL
const tourContainer = document.querySelector('.tour-container');
if (tourContainer) {
    let autoScroll = true;
    let scrollPos = 0;
    let resumeTimeout;

    tourContainer.addEventListener('mouseenter', () => {
        autoScroll = false;
        clearTimeout(resumeTimeout);
        scrollPos = tourContainer.scrollLeft;
    });
    tourContainer.addEventListener('mouseleave', () => { autoScroll = true; });
    tourContainer.addEventListener('touchstart', () => {
        autoScroll = false;
        clearTimeout(resumeTimeout);
        scrollPos = tourContainer.scrollLeft;
    }, { passive: true });
    tourContainer.addEventListener('touchend', () => {
        resumeTimeout = setTimeout(() => {
            scrollPos = tourContainer.scrollLeft;
            autoScroll = true;
        }, 2000);
    });

    (function scrollStep() {
        if (autoScroll) {
            scrollPos += 0.4;
            const maxScroll = tourContainer.scrollWidth - tourContainer.clientWidth;
            if (scrollPos >= maxScroll) scrollPos = 0;
            tourContainer.scrollLeft = scrollPos;
        }
        requestAnimationFrame(scrollStep);
    })();
}

// TOUR LIGHTBOX
const tourLightbox = document.getElementById('tour-lightbox');
const tourLightboxImg = document.getElementById('tour-lightbox-img');
const tourLightboxTitle = document.getElementById('tour-lightbox-title');
const closeTourLightbox = document.getElementById('close-tour-lightbox');

if (tourLightbox) {
    document.querySelectorAll('.tour-card').forEach(card => {
        card.addEventListener('click', () => {
            tourLightboxImg.src = card.dataset.image;
            tourLightboxTitle.textContent = card.dataset.title;
            tourLightbox.classList.remove('hide-tour-lightbox');
        });
    });

    closeTourLightbox.addEventListener('click', () => tourLightbox.classList.add('hide-tour-lightbox'));
    tourLightbox.addEventListener('click', (e) => {
        if (e.target === tourLightbox) tourLightbox.classList.add('hide-tour-lightbox');
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') tourLightbox.classList.add('hide-tour-lightbox');
    });
}