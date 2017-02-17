
<?php
$this->debuger->front_load_js('jquery.min');
$this->debuger->front_load_js('moment-with-locales.min');
$this->debuger->front_load_js('transition');
$this->debuger->front_load_js('collapse');
$this->debuger->front_load_js('bootstrap.min');
$this->debuger->front_load_js('bootstrap-datetimepicker');
?>


<section class="content">
  <?php
  $colorArr = array(
    '0' => 'teal',
    '1' => 'cyan',
    '2' => 'green',
    '3' => 'orange',
    '4' => 'blue-grey',
    '5' => 'pink',
    '6' => 'light-blue',
    '7' => 'light-green',
    '8' => 'amber',
  );
  // $this->debuger->prevalue($colorArr);
  ?>

  <div class="container-fluid">
    <!-- No Header Card -->
    <div class="block-header text-center">
      <h1>ภาพรวมสรุปยอดบริษัท</h1><hr>
    </div>

    <div class="row">
      <div class="col-md-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="card">
          <div class="body bg-blue">
            <div class="row">
              <div class="col-md-12 text-center">
                <h3>สรุปรายได้บริษัททั้งหมด</h3>

              </div>
              <div class="col-md-12 text-center">
                <h4><?php echo number_format($AllCompany+$AdviserCompany); ?> บาท</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-offset-0 col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="card">
          <div class="body bg-red">
            <div class="row">
              <div class="col-md-12 text-center">
                <h3>สรุปค่าใช้จ่ายบริษัททั้งหมด</h3>

              </div>
              <div class="col-md-12 text-center">
                <h4><?php echo number_format($Expenses+$Adviser); ?> บาท</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- No Header Card -->
    <div class="block-header text-center">
      <h3>รายได้บริษัท</h3><hr>
    </div>
    <div class="row">
      <div class="col-md-offset-0 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
          <div class="body bg-green">
            <div class="row">
              <div class="col-md-12 text-center">
                <h4>สรุปค่าการตลาด บริษัท</h4>

              </div>
              <div class="col-md-12 text-center">
                <h4><?php echo $Company; ?> บาท</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
          <div class="body bg-green">
            <div class="row">
              <div class="col-md-12 text-center">
                <h4>สรุปค่าแนะนำตรง บริษัท</h4>

              </div>
              <div class="col-md-12 text-center">
                <h4><?php echo $AdviserCompany; ?> บาท</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="card">
        <div class="body bg-green">
          <div class="row">
            <div class="col-md-12 text-center">
              <h4>สรุปยอดขายสินค้า บริษัท</h4>

            </div>
            <div class="col-md-12 text-center">
              <h4><?php echo $Sale ?> บาท</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

  <div class="container-fluid">
    <!-- No Header Card -->
    <div class="block-header text-center">
      <h3>ค่าใช้จ่ายบริษัท</h3><hr>
    </div>
    <div class="row">
      <div class="col-md-offset-2 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
          <div class="body bg-orange">
            <div class="row">
              <div class="col-md-12 text-center">
                <h4>สรุปค่าใช้จ่ายค่าการตลาด</h4>

              </div>
              <div class="col-md-12 text-center">
                <h4><?php echo $Expenses ?> บาท</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-offset-0 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
          <div class="body bg-orange">
            <div class="row">
              <div class="col-md-12 text-center">
                <h4>สรุปค่าใช้จ่ายค่าแนะนำตรง</h4>

              </div>
              <div class="col-md-12 text-center">
                <h4><?php echo $Adviser ?> บาท</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Morris Plugin Js -->
<script src="<?php echo base_url('assets/theme/back-end/plugins/raphael/raphael.min.js')  ?>"></script>
<script src="<?php echo base_url('assets/theme/back-end/plugins/morrisjs/morris.js') ?>"></script>
<script src="<?php echo base_url('assets/theme/back-end/plugins/chartjs/Chart.js') ?>"></script>

<script type="text/javascript">
$(function () {
  new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
});
function getChartJs(type) {
  var config = null;
  if (type === 'bar') {
    config = {
      type: 'bar',
      data: {
        labels: ["ทีม A", "ทีม B", "ทีม C", "ทีม D", "ทีม E", "ทีม F", "ทีม G", "ทีม H", "ทีม I"],
        datasets: [{
          label: "สมาชิก",
          data: [
            <?php
            for($i = 'A' ; $i <= 'I' ; $i++){
              echo $CodeTeam[$i].',';
            } ?>
          ],
          backgroundColor: 'rgba(0, 188, 212, 0.8)'
        }]
      },
      options: {
        responsive: true,

        legend: false,
        scales: {
          yAxes: [{
            ticks: {
              stepSize: 1,
              beginAtZero: true
            }
          }]
        }
      }
    }
  }
  return config;
}
</script>
