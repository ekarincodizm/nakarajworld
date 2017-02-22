<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="#">ADMIN - NAVA DRAGON WEALTH NETWORK CO.,LTD.</a>
        </div>

    </div>
</nav>
<!-- #Top Bar -->

<section>
    <aside id="leftsidebar" class="sidebar">

<!-- #User Info -->
<div class="menu">
    <ul class="list">
        <!-- <li class="header">ภาพรวม</li> -->
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">widgets</i>
                <span>ภาพรวม</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="<?php echo site_url('/DashBoardMain');?>" class=" waves-effect waves-block">
                        <i class="material-icons">timeline</i>
                        <span>ระบบธุรกิจเครือข่าย</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('/History');?>" class=" waves-effect waves-block">
                      <i class="material-icons">assignment</i>
                        <span>สรุปยอดบริษัท</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('/SaleOrderHistory');?>" class=" waves-effect waves-block">
                        <i class="material-icons">store</i>
                        <span>ระบบการขาย</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- <li class="header">เครือข่าย</li> -->
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">share</i>
                <span>เครือข่าย</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="<?php echo site_url('Member');?>" class=" waves-effect waves-block">
                        <i class="material-icons">account_box</i>
                        <span>สมาชิก</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Member/MemberProfile/1');?>" class=" waves-effect waves-block">
                        <i class="material-icons">account_box</i>
                        <span>บัญชีบริษัท</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Account');?>" class=" waves-effect waves-block">
                        <i class="material-icons">share</i>
                        <span>บัญชีนักธุรกิจอิสระ</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('/BusinessSetting');?>" class=" waves-effect waves-block">
                        <i class="material-icons">tune</i>
                        <span>ตารางค่าการตลาด</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li class="header">การบัญชี</li> -->
        <li>
            <a href="<?php echo site_url('/Accounting');?>" class=" waves-effect waves-block">
                <i class="material-icons">account_balance_wallet</i>
                <span>การบัญชี</span>
            </a>

        </li>
        <li >
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">store</i>
                <span>ร้านค้า</span>
            </a>
            <ul class="ml-menu">
                <!-- <li class="header">การขาย</li> -->
                <li >
                    <a href="<?php echo site_url('/Products');?>" class=" waves-effect waves-block">
                        <i class="material-icons">card_giftcard</i>
                        <span>สินค้า</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('/SaleOrder');?>" class=" waves-effect waves-block">
                        <i class="material-icons">receipt</i>
                        <span>ใบสั่งซื้อ</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('/Config/ShopConfig');?>" class=" waves-effect waves-block">
                        <i class="material-icons">settings_applications</i>
                        <span>ตั้งค่า</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li class="header">สิทธิ์การใช้งาน</li> -->
        <li>
            <a href="<?php echo site_url('/Permission');?>" class=" waves-effect waves-block">
                <i class="material-icons">vpn_key</i>
                <span>กำหนดสิทธิ์การใช้งาน</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">public</i>
                <span>เว็บไซต์</span>
            </a>
            <ul class="ml-menu">
                <!-- <li class="header">การขาย</li> -->
                <li>
                    <a href="<?php echo site_url('/Config/ConfigDetail');?>" class=" waves-effect waves-block">
                        <i class="material-icons">format_color_text</i>
                        <span>เนื้อหา</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('/Config');?>" class=" waves-effect waves-block">
                        <i class="material-icons">settings_applications</i>
                        <span>ตั้งค่าทั่วไป</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('/Config/ConfigBG');?>" class=" waves-effect waves-block">
                        <i class="material-icons">settings_applications</i>
                        <span>ตั้งค่าพื้นหลัง</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('/Admin/Logout');?>" class=" waves-effect waves-block">
                <i class="material-icons">input</i>
                <span>ออกจากระบบ</span>
            </a>
        </li>
    </ul>

</div>


<div class="legal">
    <div class="copyright">
        &copy; 2016 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
    </div>
    <div class="version">
        <b>Version: </b> 1.0.4
    </div>
</div>

</aside>

</section>
