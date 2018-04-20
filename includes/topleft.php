
<?php if ($is_admin)
{
?>
<a href="./adminDashboard.php" class="simple-text"><?php echo $user['name'] ?></a>
<center><h6>(admin)</h6></center>
<?php
 }else if($is_office)
{?>
<a href="./officeDashboard.php" class="simple-text"><?php echo $user['name'] ?></a>
<center><h6>(<?php echo $_SESSION['role']; ?>)</h6></center>
<?php
}

else {
 ?>
 <a href="./dashboard.php" class="simple-text"><?php echo $user['name'] ?></a>
 <center><h6>(<?php echo $_SESSION['role']; ?>)</h6></center>
 <?php
 }
 ?>