const nav_items = document.querySelector('.navItems');
const open_NavBtn = document.querySelector('#openNavBtn');
const close_NavBtn = document.querySelector('#closeNavBtn');


const openNav = () => {
  nav_items.style.display = 'flex';
  open_NavBtn.style.display = 'none';
  close_NavBtn.style.display = 'inline-block';
}
const closeNav = () => {
  nav_items.style.display = 'none';
  open_NavBtn.style.display = 'inline-block';
  close_NavBtn.style.display = 'none';
}

open_NavBtn.addEventListener('click', openNav);
close_NavBtn.addEventListener('click', closeNav);