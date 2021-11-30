<?php if (Auth::user()->role_user == 999): ?>
    <?php
      header("Location: admin/home");
      exit;
    ?>
<?php elseif (Auth::user()->role_user == 1): ?>
    <?php
      header("Location: staff/home");
      exit;
    ?>
<?php elseif (Auth::user()->role_user == 882): ?>
    <?php
      header("Location: facman/home");
      exit;
    ?>

<?php elseif (Auth::user()->role_user == 881): ?>
    <?php
      header("Location: offman/home");
      exit;
    ?> 
<?php elseif (Auth::user()->role_user == 883): ?>
    <?php
      header("Location: purcman/home");
      exit;
    ?> 
<?php endif ?>
