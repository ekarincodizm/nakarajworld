<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    ค่าการตลาด แผน 1
                </div>
                <div class="body">

                    <div class="row clearfix">
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ชั้นที่</th>
                                        <th class="text-right">จำนวนรหัส</th>
                                        <th>ยอดรวม</th>
                                        <th>ค่าการตลาด (%)</th>
                                        <th class="text-right">ค่าการตลาด (บาท)</th>
                                        <th>วันที่แก้ไข</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; $c=3; foreach ($PlanOneSetting as $row): ?>
                                        <?php echo form_open('/BusinessSetting/SavePlan/'.$row['income_percent_id']); ?>
                                        <tr>
                                            <td><?php echo "ชั้นที่ ".$row['income_percent_level']; ?></td>
                                            <td class="text-right"><?php echo $c; ?></td>
                                            <td>
                                                <div class="form-line">
                                                    <input name="income_percent_point" type="number" class="form-control text-center" value="<?php echo $row['income_percent_point']; ?>"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-line">
                                                    <input name="income_percent_amount" step="any" type="number" class="form-control text-center" value="<?php echo $row['income_percent_amount']; ?>"/>
                                                </div>
                                            </td>
                                            <td class="text-right"><?php echo number_format($row['income_percent_point']*$row['income_percent_amount']/100); ?></td>
                                            <td><?php echo $this->thaidate->FullDate($row['income_percent_date']); ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-success">
                                                    บันทึก
                                                </button>
                                            </td>
                                        </tr>
                                        <?php echo form_close(); ?>
                                        <?php $i++; $c*=3; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
