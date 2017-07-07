<?php

/**
 * @file
 * Template file.
 */
?>
<div id="banana_dashboard">
  <ul class="banana_dashboard_menu menu inline">
    <?php foreach($dashboard_menu as $menu_item): ?>
      <li class="dashboard-menu-item <?php
// Echo $menu_item['class'];. ?>" >
        <a href="<?php echo $menu_item['url']; ?>" class="banana-dashboard-menu-link  <?php echo 'dashboard-icon-' . $menu_item['icon'] ?>"><?php echo $menu_item['title'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
