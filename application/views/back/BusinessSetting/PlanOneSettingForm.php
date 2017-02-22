<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ค่าการตลาด แผน 1 ระดับ สมาชิก
                </div>
                <div class="body">

                    <div class="row clearfix">
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ชั้นที่</th>
                                        <th class="text-right">จำนวนรหัส</th>
                                        <th class="text-right">จำนวนล็อต</th>
                                        <th class="text-right">จำนวนครบจ่าย</th>
                                        <th class="text-right">ยอดรวม</th>
                                        <th class="text-right">ค่าการตลาด (%)</th>
                                        <th class="text-right">ค่าการตลาด (บาท)</th>
                                        <!-- <th>ตัวเลือก</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $amount=0; $i=1; $c=3; foreach ($PlanOneSetting as $row): ?>
                                        <?php echo form_open('/BusinessSetting/SavePlan/'.$row['income_percent_id']); ?>
                                        <tr>
                                            <td><?php echo "ชั้นที่ ".$row['income_percent_level']; ?></td>
                                            <td class="text-right"><?php echo $c; ?></td>
                                            <td class="form-line text-right">
                                                <?php echo $row['income_percent_lot']; ?>
                                            </td>
                                            <td class="form-line text-right">
                                                <?php echo $row['income_percent_goal']; ?>
                                            </td>
                                            <td>
                                                <div class="form-line text-right">
                                                    <!-- <input name="income_percent_point" type="number" class="form-control text-center" value=" -->
                                                    <?php echo number_format($row['income_percent_point']); ?>
                                                    <!-- "/> -->
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-line text-right">
                                                    <!-- <input name="income_percent_amount" step="any" type="number" class="form-control text-center" value=" -->
                                                    <?php echo $row['income_percent_amount']; ?>
                                                    <!-- "/> -->
                                                </div>
                                            </td>
                                            <?php $money = $row['income_percent_point']*$row['income_percent_amount']/100?>
                                            <td class="text-right"><?php echo number_format($money); ?></td>
                                            <!-- <td><?php echo $this->thaidate->FullDate($row['income_percent_date']); ?></td> -->
                                            <!-- <td>
                                                <button type="submit" class="btn btn-success">
                                                    บันทึก
                                                </button>
                                            </td> -->
                                        </tr>
                                        <?php echo form_close(); ?>
                                        <?php $i++; $c*=3; $amount += $money; endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right" style="color:green;">รวม : <?php echo number_format($amount);?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ค่าการตลาด แผน 2 ระดับ General ขึ้นไป
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ชั้นที่</th>
                                                <th class="text-right">จำนวนรหัส</th>
                                                <th class="text-right">จำนวนล็อต</th>
                                                <th class="text-right">จำนวนครบจ่าย</th>
                                                <th class="text-right">ยอดรวม</th>
                                                <th class="text-right">ค่าการตลาด (%)</th>
                                                <th class="text-right">ค่าการตลาด (บาท)</th>
                                                <!-- <th>ตัวเลือก</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $amount=0; $i=1; $c=3; foreach ($PlanOneSetting2 as $row): ?>
                                                <?php echo form_open('/BusinessSetting/SavePlan/'.$row['income_percent_id']); ?>
                                                <tr>
                                                    <td><?php echo "ชั้นที่ ".$row['income_percent_level']; ?></td>
                                                    <td class="text-right"><?php echo $c; ?></td>
                                                    <td class="form-line text-right">
                                                        <?php echo $row['income_percent_lot']; ?>
                                                    </td>
                                                    <td class="form-line text-right">
                                                        <?php echo $row['income_percent_goal']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="form-line text-right">
                                                            <!-- <input name="income_percent_point" type="number" class="form-control text-center" value=" -->
                                                            <?php echo number_format($row['income_percent_point']); ?>
                                                            <!-- "/> -->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-line text-right">
                                                            <!-- <input name="income_percent_amount" step="any" type="number" class="form-control text-center" value=" -->
                                                            <?php echo $row['income_percent_amount']; ?>
                                                            <!-- "/> -->
                                                        </div>
                                                    </td>
                                                    <?php $money = $row['income_percent_point']*$row['income_percent_amount']/100?>
                                                    <td class="text-right"><?php echo number_format($money); ?></td>
                                                    <!-- <td><?php echo $this->thaidate->FullDate($row['income_percent_date']); ?></td> -->
                                                    <!-- <td>
                                                        <button type="submit" class="btn btn-success">
                                                            บันทึก
                                                        </button>
                                                    </td> -->
                                                </tr>
                                                <?php echo form_close(); ?>
                                                <?php $i++; $c*=3; $amount += $money; endforeach; ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right" style="color:green;">รวม : <?php echo number_format($amount);?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
