<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="far fa-file"></i>

        </div>
        <div class="sidebar-brand-text mx-3">SIAMI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QueryMenu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `ami_user_menu`.`id`, `menu`
                  FROM `ami_user_menu` 
                  JOIN `ami_user_access_menu` 
                  ON `ami_user_menu`.`id` = `ami_user_access_menu`.`menu_id`
                  WHERE `ami_user_access_menu`.`role_id` = $role_id
                  ORDER BY `ami_user_access_menu`.`menu_id` ASC
                  ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Looping Menu -->
    <!-- Heading -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu'];  ?>
        </div>

        <!-- Sub Menu -->
        <?php
        $menuId = $m['id'];
        // SELECT *
        // FROM `ami_user_sub_menu` 
        // WHERE `menu_id` = $menuId
        // AND `is_active` = 1
        $querySubMenu = "SELECT *
                         FROM `ami_user_sub_menu` 
                         JOIN `ami_user_menu` 
                         ON `ami_user_sub_menu`.`menu_id` = `ami_user_menu`.`id`
                         WHERE `ami_user_sub_menu`.`menu_id` = $menuId
                         AND `ami_user_sub_menu`.`is_active` = 1
                         ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>

        <?php endforeach; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php endforeach; ?>





    <!-- Heading
    <div class="sidebar-heading">
        User
    </div>

    Nav Item - Charts
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="far fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li> -->


    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->