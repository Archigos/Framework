<?php
  if(!defined('Config_Security_Key')) {
    die(trigger_error('Security Key Not Present or Invalid', 256));
  }

  if(!isset($isLoggedIn)) {
    $isLoggedIn = (isset($GLOBALS['isLoggedIn'])) ?: false;
  }
  $user       = $GLOBALS['user'];
?>

<header>
  <div class="name">
    Greetings, <?= ($isLoggedIn) ? e($user->data()->name) : 'Unknown User'; ?>
  </div>
  <div class="status">
    <a class="white" href="<?= FRAMEWORK ?>admin/<?= (($isLoggedIn) ? 'logout' : 'login' ) ?>.php">
      <?= (($isLoggedIn) ? 'Log Out' : 'Log In'); ?>
    </a>
  </div>
</header>
