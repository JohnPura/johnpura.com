const mobileNav = () => {

  const nav = document.querySelector('nav');
  const navItems = document.querySelectorAll('.nav-item');
  const navSlider = document.querySelector('.mobile-nav');

  navSlider.addEventListener('click', () => {

    // slides out mobile navigation
    nav.classList.toggle('nav-active');
    nav.style.transition = 'transform 0.5s ease-in';

    // animate mobile navigation links
    navItems.forEach((item, i) => {
      if(item.style.animation) {
        item.style.animation = '';
      } else {
        item.style.animation = `navFadeIn .55s ease forwards ${i/7 + .3}s`;
      }
    });

    // navigation close icon
    navSlider.classList.toggle('close');

  });
};

mobileNav();
