<?php

use Archigos\Admin\Developer;

if(!defined('Config_Security_Key')) {
  die(trigger_error('Security Key Not Present or Invalid', 256));
}

if(!isset($isLoggedIn)) {
  $isLoggedIn = (isset($GLOBALS['isLoggedIn'])) ?: false;
}

?>

<footer>
  <ul class="footer-menu">
    <li class="btn-home">
      <a href='/'><img alt="Home" src="<?= FRAMEWORK ?>views/img/site/home.png" /></a>
    </li><!-- End .btn-home -->
    <li class="btn-profile">
      <a onclick="toggleMe('profile')">Profile</a>
      <div class="column-three" id="profile">
        <?php if($isLoggedIn): ?>
          <div class="profile-card">
            <div class="profile-card__date"><span>Joined:</span><?= $data->joined ?></div>
            <div class="profile-card__rank"><?= $data->group; ?></div>
            <div class="profile-card__title"><?= e($data->username) ?></div>
            <div class="profile-card__subtitle"><?= e($data->name) ?></div>
            <div class="profile-card__details">
              <a href="#">Details</a>
            </div>
            <div class="profile-card__image">
              <img class="img_left" alt="Gravatar Image" src="<?= $gravatar; ?>" height="40" width="40" />
            </div>
          </div>
        <?php else: ?>
          <div class="profile-card">
            <p style="padding-left: 10px;">You must be logged in to view this.</p><?= "\n"; ?>
          </div>
        <?php endif; ?>
    </li><!-- End .btn-profile -->
  </ul>
  <ul class="copyright">
    <li><?= Developer::autoCopyright('2015'); ?></li>
  </ul>
</footer>
