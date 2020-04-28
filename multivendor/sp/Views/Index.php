<?php if ($_SESSION['verified'] == 0): ?>
  <?php require_once './Components/verification-msg.php'; ?>
<?php else: ?>
  <div class="uk-container">
    <h1>Dashboard</h1>
  </div>
<?php endif; ?>
