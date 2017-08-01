<?php

/**
 * @file
 * Template file.
 */
?>
<div id="banana_dashboard">
  <?php foreach ($dashboard_menu as $group => $menu_items): ?>
    <ul class="banana_dashboard_menu menu inline group-<?php echo $group; ?>">
      <span class="label"><?php echo $group ?></span>
      <?php foreach($menu_items as $menu_item): ?>
        <li class="dashboard-menu-item" >
          <a href="<?php echo $menu_item['url']; ?>" class="banana-dashboard-menu-link  <?php echo 'dashboard-icon-' . $menu_item['icon'] ?>"><?php echo $menu_item['title'] ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endforeach ?>
</div>
