<?php  $var = $AccountingDetail[0]; ?>
<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <thead>

        <tr>
          <th>#</th>
          <th>รายการ</th>
          <th class="text-right">จำนวน</th>
          <th class="text-right">ราคาต่อหน่วย</th>
          <th class="text-right">ยอดรวม</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>1</td>
          <td><?php echo $var['journals_detail'] ?></td>
          <td class="text-right">1</td>
          <?php if ($var['source_amount']==0): ?>
            <td><strong class="text-muted right">-</strong></td>
            <td><strong class="text-muted right">-</strong></td>
          <?php else: ?>
            <td class="text-right"><?php echo number_format($var['source_amount']) ?></td>
            <td class="text-right"><?php echo number_format($var['source_amount']) ?></td>
          <?php endif; ?>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-6 text-right">

  </div>
  <div class="col-md-6 text-right">
    <table class="table">
      <tbody>
        <tr>
          <td>ราคา</td>
          <?php if ($var['source_amount']==0): ?>
            <td><strong class="text-muted center">-</strong></td>
          <?php else: ?>
            <td><?php echo $var['source_amount']?></td>
          <?php endif; ?>
          <td>บาท</td>
        </tr>
        <tr>
          <td>ภาษี(7%)</td>
          <td>ไม่มี</td>
          <td></td>
        </tr>
        <tr>
          <td>ราคาสุทธิ</td>
          <?php if ($var['source_amount']==0): ?>
            <td><strong class="text-muted center">-</strong></td>
          <?php else: ?>
            <td><?php echo $var['source_amount']?></td>
          <?php endif; ?>
          <td>บาท</td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
