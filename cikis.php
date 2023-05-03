<?php
session_start();
session_unset();
session_destroy();
?>
<script>
  alert('Başarıyla çıkış yaptınız.');
  window.location.replace('index.php');
</script>
