<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <thead>

        <tr>
          <th>#</th>
          <th>รายการ</th>
          <th>ชื่อสินค้า</th>
          <th class="text-right">จำนวน</th>
          <th class="text-right">ราคาต่อหน่วย</th>
          <th class="text-right">ยอดรวม</th>
        </tr>
      </thead>
      <tbody>

        <?php $i=1; foreach ($var['source_detail']['order_item'] as $row): ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $var['journals_detail'] ?></td>
          <td><?php echo $row['products_name'] ?></td>
          <td class="text-right"><?php echo number_format($row['journal_sale_order_item_quantity']) ?></td>
          <td class="text-right"><?php echo number_format($row['journal_sale_order_item_price']) ?> </td>
          <td class="text-right"><?php echo number_format($row['journal_sale_order_item_quantity']*$row['journal_sale_order_item_price']) ?></td>
        </tr>

        <?php $i++; endforeach; ?>
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
          <td><?php echo $var['source_amount']?></td>
          <td>บาท</td>
        </tr>
        <tr>
          <td>ภาษี(7%)</td>
          <td>ไม่มี</td>
          <td></td>
        </tr>
        <tr>
          <td>ราคาสุทธิ</td>
          <td><?php echo $var['source_amount']?></td>
          <td>บาท</td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
