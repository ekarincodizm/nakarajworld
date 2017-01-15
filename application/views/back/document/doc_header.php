<!doctype html >
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title>ระบบการผลิต</title>
  <?php
  $this->debuger->load_back_plugins_css('bootstrap/css/bootstrap.min');
  // $this->debuger->load_back_css('fonts');
  $this->debuger->load_back_css('css_doc/style');
  // $this->debuger->load_back_css('css_doc/fonts/thsarabunnew');
  ?>
  <style media="print">
    .no-print{
      display: none;
    }
  </style>
  <style media="all">

  .table>tbody>tr>td {
    padding: 5px;
  }
  .invoice {
    border: 1px solid #000 !important;
    font-size: 11px;
  }
  .invoice th {
    /*border-top: 0px !important;*/
    border-left: 1px solid #000 !important;
    border-right: 1px solid #000 !important;
    border-bottom: 1px solid #000 !important;
  }
  .invoice td {
    border-top: 0px !important;
    border-left: 1px solid #000 !important;
    border-right: 1px solid #000 !important;
    border-bottom: 0px !important;
  }
  span.empty {
    height: 15.5px;
    display: block;
  }

  </style>
  <body>
