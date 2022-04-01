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



const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#showSidebarBtn');
const hideSidebarBtn = document.querySelector('#hideSidebarBtn');

const showSidebar = () => {
  sidebar.style.left = '0';
  showSidebarBtn.style.display = 'none';
  hideSidebarBtn.style.display = 'inline-block';
}

const hideSidebar = () => {
  sidebar.style.left = '-100%';
  showSidebarBtn.style.display = 'inline-block';
  hideSidebarBtn.style.display = 'none';
}


showSidebarBtn.addEventListener('click', showSidebar);
hideSidebarBtn.addEventListener('click', hideSidebar);