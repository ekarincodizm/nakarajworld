<div class="row">
  <div class="col-md-12" style="padding:20px">
    <?php if ($Upline[0]['member_id']==1) {?>
      <h4 class=""><?php echo $Upline[0]['member_firstname']." ".$Upline[0]['member_lastname']; ?></h4>
      รหัส <?php echo $Upline[0]['account_team'].sprintf("%04d", $Upline[0]['account_level']).sprintf("%04d", $Upline[0]['account_code']); ?>
    <?php } else { ?>
      <h4 class=""><?php echo "คุณ".$Upline[0]['member_firstname']." ".$Upline[0]['member_lastname']; ?></h4>
      รหัส <?php echo $Upline[0]['account_team'].sprintf("%04d", $Upline[0]['account_level']).sprintf("%04d", $Upline[0]['account_code']); ?>
    <?php } ?>
</div>
</div>
