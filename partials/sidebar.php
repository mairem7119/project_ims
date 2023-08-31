<div class="dashboard_sidebar" id="dashboard_sidebar">
  <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
  <div class="dashboard_sidebar_user">
    <img src="./images/user_avatar.PNG" alt="User image." id="userImg" />
    <span><?= $user["first_name"] . ' ' . $user["last_name"] . '' ?></span>
  </div>
  <div class="dashboard_sidebar_menus">
    <ul class="dashboard_menu_list">
      <li class="menuActive">
        <a href="./dashboard.php"><i class="fa fa-dashboard menuIcons"></i><span class="menuText" style="margin-left: 10px;">Dashboard</span></a>
      </li>
      <li>
        <a href="./register.php"><i class="fa fa-user-plus menuIcons"></i><span class="menuText" style="margin-left: 10px;">Add user</span></a>
      </li>
      <li>
        <a href=""><i class="fa fa-dollar menuIcons"></i><span class="menuText" style="margin-left: 10px;">Revenue Managements</span></a>
      </li>
      <li>
        <a href=""><i class="fa fa-book menuIcons"></i><span class="menuText" style="margin-left: 10px;">Accounts Receivable</span></a>
      </li>
      <li>
        <a href=""><i class="fa fa-gears menuIcons"></i><span class="menuText" style="margin-left: 10px;">Configurations</span></a>
      </li>
      <li>
        <a href=""><i class="fa fa-line-chart menuIcons"></i><span class="menuText" style="margin-left: 10px;">Starts</span></a>
      </li>
    </ul>
  </div>
</div>