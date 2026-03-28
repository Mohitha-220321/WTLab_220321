<?php
require 'config.php';

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>

<h2>Customer Support</h2>

<?php if(isset($user)): ?>

Welcome <b><?php echo $user['name']; ?></b><br>
Email: <?php echo $user['email']; ?><br><br>

<textarea rows="4" cols="40" placeholder="Describe your issue"></textarea><br><br>
<button>Submit</button><br><br>

<a href="logout.php">Logout</a>

<?php else: ?>

<a href="<?php echo $client->createAuthUrl(); ?>">
<button>Login with Google</button>
</a>

<?php endif; ?>
