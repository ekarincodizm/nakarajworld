<?php  $var = $AccountingDetail[0]; ?>
<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <thead>

        <tr>
          <th>#</th>
          <th>รายการ</th>
          <th>รหัสบิล</th>
          <th class="text-right">จำนวน</th>
          <th class="text-right">ราคาต่อหน่วย</th>
          <th class="text-right">ยอดรวม</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>1</td>
          <td><?php echo $var['journals_detail'] ?></td>
          <td class="text-right"><?php echo ($var['journal_fee_code']) ?> </td>
          <td class="text-right">1</td>
          <td class="text-right"><?php echo number_format($var['journal_fee_amount']) ?> </td>
          <td class="text-right"><?php echo number_format($var['source_amount']) ?> </td>

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
          <td><?php echo number_format($var['source_amount'])?></td>
          <td>บาท</td>
        </tr>
        <tr>
          <td>ภาษี(7%)</td>
          <td>ไม่มี</td>
          <td></td>
        </tr>
        <tr>
          <td>ราคาสุทธิ</td>
          <td><?php echo number_format($var['source_amount'])?></td>
          <td>บาท</td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
