var sidebarIsOpen = true;
toggleBtn.addEventListener("click", (event) => {
  event.preventDefault();
  if (sidebarIsOpen) {
    dashboard_sidebar.style.width = "10%";
    dashboard_sidebar.style.transition = "0.3s all";
    dashboard_content_container.style.width = "90%";
    dashboard_logo.style.fontsize = "60px";
    userImg.style.width = "60px";
    userImg.style.height = "60px";
    menuIcons = document.getElementsByClassName("menuText");
    for (var i = 0; i < menuIcons.length; i++) {
      menuIcons[i].style.display = "none";
    }
    document.getElementsByClassName("dashboard_menu_list")[0].style.textAlign =
      "center";
    sidebarIsOpen = false;
  } else {
    dashboard_sidebar.style.width = "20%";
    dashboard_content_container.style.width = "80%";
    dashboard_logo.style.fontsize = "64px";
    userImg.style.width = "70px";
    userImg.style.height = "70px";
    menuIcons = document.getElementsByClassName("menuText");
    for (var i = 0; i < menuIcons.length; i++) {
      menuIcons[i].style.display = "inline-block";
    }
    document.getElementsByClassName("dashboard_menu_list")[0].style.textAlign =
      "left";
    sidebarIsOpen = true;
  }
});
