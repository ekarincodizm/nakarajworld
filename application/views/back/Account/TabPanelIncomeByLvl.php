<div class="row">
  <div class="col-md-4 col-md-offset-4" style="padding:20px">
    <h4 class="text-center">ค่าการตลาดแผน 1</h4>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th class="text-center">ชั้น</th>
          <th class="text-right">ได้รับแล้ว</th>
          <th class="text-right">จากทั้งหมด</th>
        </tr>
      </thead>
      <tbody>
        <?php // $this->debuger->prevalue($DividendID);
         $MVbyLvl1 = array();
         $i=1;
         for ($i=1; $i <=5 ; $i++) {
            $MVbyLvl1[$i] = 0;
           foreach ($DividendID as $row) {

             if ($row['source_detail'][0]['journal_dividend_lvl'] == $i && $row['source_detail'][0]['journal_dividend_class']  == 1) {
               $MVbyLvl1[$i] += $row['source_amount'];
             }
           }
         }
        // $this->debuger->prevalue($MVbyLvl);
        $MV1 = $this->AccountModel->GetMVByClassLvl1();
        // $this->debuger->prevalue($MV1);

        ?>
        <?php $amount = 0; $i=1; $e = 0; foreach ($MVbyLvl1 as $row): ?>
          <tr>
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-right"><?php echo number_format($row) ?></td>
            <td class="text-right"><?php echo number_format(($MV1[$e]['income_percent_point']*$MV1[$e]['income_percent_amount'])/100) ?></td>
          </tr>

          <?php $i++; $e++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
