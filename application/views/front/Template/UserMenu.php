<div id="userMenu" class="bs-example" data-example-id="simple-nav-stacked">
  <ul  class="nav nav-pills nav-stacked nav-pills-stacked-example">
    <li role="presentation"><a href="<?php echo site_url('homepage/AccountList'); ?>">เครือข่าย</a></li>
    <li role="presentation"><a href="<?php echo site_url('homepage/IncomeList'); ?>">เงินปันผล</a></li>
    <li role="presentation"><a href="<?php echo site_url('homepage/Profile'); ?>">กลับไปยังโปรไฟล์</a></li>
  </ul>
</div>
<script type="text/javascript">
// alert(window.location.href.substr(window.location.href));
$(function() {
  $("#userMenu ul li a").each(function(){
    if( $(this).attr("href") == window.location.href ){
      $(this).parent().addClass('active');
    }
  })
});
</script>
