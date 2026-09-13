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

  if (currentScrollPos > 8) {
      myHeader.classList.add("is-scrolled");
  } else {
      myHeader.classList.remove("is-scrolled");
  }
}

// HAMBURGER MENU CLICK EVENT
hamburgerMenu.addEventListener('click', function() {
  if (hamburgerMenu.checked) {
    slideMenu.classList.remove("hide-menu");
  } else {
    slideMenu.classList.add("hide-menu");
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

// SCROLL REVEAL
const revealTargets = document.querySelectorAll('.reveal');
if (revealTargets.length) {
    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
        revealTargets.forEach((el) => revealObserver.observe(el));
    } else {
        revealTargets.forEach((el) => el.classList.add('is-visible'));
    }
}

// QUICK CONTACT FAB
const quickContactFab = document.querySelector('.quick-contact-fab');
if (quickContactFab) {
    const fabToggle = quickContactFab.querySelector('.fab-toggle');
    const fabActions = quickContactFab.querySelectorAll('.fab-action');

    const closeFab = () => {
        quickContactFab.classList.remove('is-open');
        fabToggle.setAttribute('aria-expanded', 'false');
        fabActions.forEach((action) => action.setAttribute('tabindex', '-1'));
    };
    const openFab = () => {
        quickContactFab.classList.add('is-open');
        fabToggle.setAttribute('aria-expanded', 'true');
        fabActions.forEach((action) => action.removeAttribute('tabindex'));
    };

    closeFab();

    fabToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        quickContactFab.classList.contains('is-open') ? closeFab() : openFab();
    });
    document.addEventListener('click', (e) => {
        if (!quickContactFab.contains(e.target)) closeFab();
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeFab();
    });
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