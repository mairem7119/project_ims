<?php 
  session_start();
  $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IMS Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css" />
    <script
      src="https://kit.fontawesome.com/43a9581a47.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <div id="dashboard_main_container">
      <div class="dashboard_sidebar" id="dashboard_sidebar">
        <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
        <div class="dashboard_sidebar_user">
          <img src="./images/user_avatar.PNG" alt="User image." id="userImg" />
          <span><?= $user["first_name"] . ' '. $user["last_name"] . ''?></span>
        </div>
        <div class="dashboard_sidebar_menus">
          <ul class="dashboard_menu_list">
            <li class="menuActive">
              <a href=""
                ><i class="fa fa-dashboard menuIcons"></i
                ><span class="menuText">Dashboard</span></a
              >
            </li>
            <li>
              <a href=""
                ><i class="fa fa-dashboard menuIcons"></i
                ><span class="menuText">Dashboard</span></a
              >
            </li>
          </ul>
        </div>
      </div>
      <div class="dashboard_content_container" id="dashboard_content_container">
        <div class="dashboard_topNav">
          <a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
          <a href="index.php"><i class="fa fa-power-off" id="logout_icon"></i>Log out</a>
        </div>
        <div class="dashboard_content">
          <div class="dashboard_contain_main"></div>
        </div>
      </div>
    </div>

    <script>
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
          document.getElementsByClassName(
            "dashboard_menu_list"
          )[0].style.textAlign = "center";
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
          document.getElementsByClassName(
            "dashboard_menu_list"
          )[0].style.textAlign = "left";
          sidebarIsOpen = true;
        }
      });
    </script>
  </body>
</html>
