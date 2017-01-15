<?php
if (!isset($_SESSION['MEMBER_ID'])) {
  redirect('/HomePage/LoginPage');
}else {
  $MEMBER_ID = $_SESSION['MEMBER_ID'];
  ?>
  <script>
    var MEMBER_ID = "<?php echo $MEMBER_ID ?>";
  </script>
<?php } ?>
