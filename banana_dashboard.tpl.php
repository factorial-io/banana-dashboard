<?php

/**
 * @file
 * Template file.
 */
?>
<div id="banana_dashboard">
  <?php foreach ($dashboard_menu as $group => $menu_items): ?>
    <div class="banana-dashboard-group banana-dashboard-group-group-<?php echo $group; ?>">
      <h4 class="label"><?php echo $group ?></h4>
      <ul class="banana_dashboard_menu menu inline">
        <?php foreach($menu_items as $menu_item): ?>
          <li class="dashboard-menu-item" >
            <a href="<?php echo $menu_item['url']; ?>" class="banana-dashboard-menu-link  <?php echo 'dashboard-icon-' . $menu_item['icon'] ?>"><?php echo $menu_item['title'] ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endforeach ?>
</div>
