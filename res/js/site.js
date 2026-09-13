(() => {
  'use strict';

  const header = document.querySelector('.site-header');
  const menuButton = document.querySelector('.menu-toggle');
  const navigation = document.querySelector('.site-nav');
  const mobileQuery = window.matchMedia('(max-width: 999px)');
  const setMenu = (open, restoreFocus = false) => {
    menuButton.setAttribute('aria-expanded', String(open));
    menuButton.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
    navigation.classList.toggle('is-open', open);
    document.body.classList.toggle('menu-open', open);
    document.querySelectorAll('main, .site-footer, .mobile-bar').forEach(element => {
      element.inert = open;
    });
    if (restoreFocus) menuButton.focus();
  };
  menuButton.addEventListener('click', () => setMenu(menuButton.getAttribute('aria-expanded') !== 'true'));
  navigation.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
  mobileQuery.addEventListener('change', () => setMenu(false));
  document.addEventListener('keydown', event => {
    if (menuButton.getAttribute('aria-expanded') !== 'true') return;
    if (event.key === 'Escape') setMenu(false, true);
    if (event.key === 'Tab') {
      const focusable = [...header.querySelectorAll('a, button')].filter(element => element.getClientRects().length);
      const first = focusable[0];
      const last = focusable[focusable.length - 1];
      if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
      if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
    }
  });
  const updateHeader = () => header.classList.toggle('is-scrolled', window.scrollY > 10);
  window.addEventListener('scroll', updateHeader, { passive: true });
  updateHeader();

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  if ('IntersectionObserver' in window && !reducedMotion.matches) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.06, rootMargin: '0px 0px -15px 0px' });
    document.querySelectorAll('.reveal').forEach(element => {
      if (element.getBoundingClientRect().top < window.innerHeight) element.classList.add('is-visible');
      else observer.observe(element);
    });
    document.documentElement.classList.add('motion-ready');
    reducedMotion.addEventListener('change', event => {
      if (event.matches) {
        document.documentElement.classList.remove('motion-ready');
        observer.disconnect();
      }
    });
  }

  document.querySelectorAll('[data-filter-group]').forEach(group => {
    const items = [...document.querySelectorAll(`[data-collection="${group.dataset.filterGroup}"]`)];
    const buttons = [...group.querySelectorAll('[data-filter]')];
    const count = document.querySelector(`[data-count="${group.dataset.filterGroup}"]`);
    buttons.forEach(button => button.addEventListener('click', () => {
      buttons.forEach(item => item.setAttribute('aria-pressed', String(item === button)));
      let visible = 0;
      items.forEach(item => {
        const show = button.dataset.filter === 'all' || item.dataset.category === button.dataset.filter;
        item.hidden = !show;
        if (show) { visible += 1; item.classList.add('is-visible'); }
      });
      if (count) count.textContent = `${visible} ${group.dataset.filterGroup === 'rooms' ? (visible === 1 ? 'room' : 'rooms') : (visible === 1 ? 'photo' : 'photos')}`;
    }));
  });

  // One native dialog serves room galleries, property photos, and destinations.
  const dialog = document.querySelector('.lightbox');
  if (dialog) {
    const displayedImage = dialog.querySelector('.lightbox-image');
    const title = dialog.querySelector('.lightbox-title');
    const counter = dialog.querySelector('.lightbox-counter');
    const previous = dialog.querySelector('[data-gallery-prev]');
    const next = dialog.querySelector('[data-gallery-next]');
    const close = dialog.querySelector('[data-gallery-close]');
    let images = [];
    let current = 0;
    let returnFocus;
    const render = () => {
      displayedImage.src = images[current].src;
      displayedImage.alt = images[current].alt;
      counter.textContent = `${current + 1} / ${images.length}`;
      previous.hidden = next.hidden = images.length < 2;
    };
    const move = direction => { current = (current + direction + images.length) % images.length; render(); };
    document.querySelectorAll('[data-gallery]').forEach(trigger => trigger.addEventListener('click', event => {
      event.preventDefault();
      returnFocus = trigger;
      if (trigger.dataset.collection === 'gallery') {
        const visiblePhotos = [...document.querySelectorAll('[data-collection="gallery"]:not([hidden])')];
        images = visiblePhotos.map(photo => JSON.parse(photo.dataset.gallery)[0]);
        current = visiblePhotos.indexOf(trigger);
        title.textContent = 'Life at Dorsen';
      } else {
        images = JSON.parse(trigger.dataset.gallery);
        current = 0;
        title.textContent = trigger.dataset.galleryTitle;
      }
      render();
      dialog.showModal();
      document.body.classList.add('dialog-open');
      close.focus();
    }));
    previous.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));
    close.addEventListener('click', () => dialog.close());
    dialog.addEventListener('click', event => {
      const rect = dialog.getBoundingClientRect();
      if (event.target === dialog && (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom)) dialog.close();
    });
    dialog.addEventListener('keydown', event => {
      if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
        event.preventDefault();
        move(event.key === 'ArrowLeft' ? -1 : 1);
      }
    });
    dialog.addEventListener('close', () => {
      document.body.classList.remove('dialog-open');
      returnFocus?.focus({ preventScroll: true });
    });
  }

  const contactTabs = [...document.querySelectorAll('.contact-tab')];
  if (contactTabs.length) {
    const params = new URLSearchParams(window.location.search);
    const selectTab = (selected, updateUrl = true) => {
      contactTabs.forEach(tab => {
        const active = tab === selected;
        tab.setAttribute('aria-selected', String(active));
        tab.tabIndex = active ? 0 : -1;
        document.getElementById(tab.getAttribute('aria-controls')).hidden = !active;
      });
      const isTour = selected.dataset.interest === 'tours';
      const quickEnquiry = document.querySelector('.mobile-bar .button');
      quickEnquiry.firstChild.textContent = isTour ? 'Plan a trip' : 'Enquire about a stay';
      quickEnquiry.href = `?interest=${isTour ? 'tours' : 'stay'}#enquiry`;
      if (updateUrl) {
        const url = new URL(window.location.href);
        url.searchParams.set('interest', selected.dataset.interest);
        history.replaceState(null, '', url);
      }
    };
    contactTabs.forEach((tab, index) => {
      tab.addEventListener('click', () => selectTab(tab));
      tab.addEventListener('keydown', event => {
        if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
        event.preventDefault();
        let nextIndex = event.key === 'Home' ? 0 : event.key === 'End' ? contactTabs.length - 1 : (index + (event.key === 'ArrowRight' ? 1 : -1) + contactTabs.length) % contactTabs.length;
        selectTab(contactTabs[nextIndex]);
        contactTabs[nextIndex].focus();
      });
    });
    selectTab(contactTabs.find(tab => tab.dataset.interest === params.get('interest')) || contactTabs[0], false);
    const destination = document.querySelector('[data-tour-interest]');
    if (params.has('destination')) {
      destination.textContent = `You're interested in ${params.get('destination').slice(0, 100)}.`;
      destination.hidden = false;
    }
  }

  const floatingButtons = [...document.querySelectorAll('.floating-button')];
  if (floatingButtons.length) {
    const closeAll = except => {
      floatingButtons.forEach(button => {
        if (button === except) return;
        button.setAttribute('aria-expanded', 'false');
        const popover = document.getElementById(button.getAttribute('aria-controls'));
        popover.classList.remove('is-open');
        popover.inert = true;
      });
    };
    floatingButtons.forEach(button => {
      const popover = document.getElementById(button.getAttribute('aria-controls'));
      popover.inert = true;
      button.addEventListener('click', event => {
        event.stopPropagation();
        const open = button.getAttribute('aria-expanded') !== 'true';
        closeAll();
        button.setAttribute('aria-expanded', String(open));
        popover.classList.toggle('is-open', open);
        popover.inert = !open;
      });
    });
    document.addEventListener('click', event => {
      if (!event.target.closest('.floating-actions')) closeAll();
    });
    document.addEventListener('keydown', event => {
      if (event.key === 'Escape') closeAll();
    });
  }
})();
