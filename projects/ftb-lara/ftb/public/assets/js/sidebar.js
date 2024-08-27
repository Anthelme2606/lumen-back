const menu=document.querySelector('#menu-toggle');
const sidebar =document.querySelector('.sidebar');
menu.addEventListener('click',(ev)=>{
    sidebar.classList.toggle('open');
    
});
function handleClickOutside(e) {
    if (
      !e.target.closest("#sidebar") &&
      !e.target.closest("#menu-toggle") &&
      window.innerWidth <= 768
    ) {
      sidebar.classList.remove("open");
    }
  }

 
  document.addEventListener("click", handleClickOutside);
 
    const sidebarLinks = document.querySelectorAll('.sidebar a');
    const currentUrl = window.location.href;
    sidebarLinks.forEach(link => {  
        if (link.href === currentUrl) {
           
            link.classList.add('route-active');
        }
    });

