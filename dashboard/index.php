
<?php 

session_start();

  if(isset($_SESSION['username'])){

?>
<script>
  alert('Selamat Datang <?= $_SESSION['username'] ?>');
</script>
<script>
  window.location.href = window.location.origin + "/MyWebsite/web-pancasila/dashboard/examples/dashboard.php";
</script>
<?php 
  }
  else{
  $message = true;
  header("Location: ../login/login.php?message=$message");
  }

?>