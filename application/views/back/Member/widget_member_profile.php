<div class="row clearfix">
  <div class="col-md-8">
    <div class="card">
      <div class="body">
        <div class='row '>
          <!-- <div class="col-md-12 text-center"> <img alt="140x140" data-src="holder.js/140x140" class="img-circle" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTg4MDQwZjU1ZSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ODgwNDBmNTVlIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true" style="width: 100px; height: 100px;"/> </div> -->
          <div class="col-md-12 text-center">
            <h4>{{member_prefix}}{{member_firstname}} {{member_lastname}}</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5>ข้อมูลเบื้องต้น</h5>
            <div class="col-md-12">
              <p>
                {{member_id_card_type}} : {{member_citizen_id}} <br>
                วันเกิด : {{member_born | date:'fullDate'}} <br>
                อายุ : {{member_age}} ปี <br>
              </p>
            </div>

          </div>
          <div class="col-md-12">
            <h5>การติดต่อ</h5>
            <div class="col-md-6">
              <p> เบอร์โทร : {{member_phone}}<br>
                ที่อยู่ : {{member_address}}<br>
              </p>
            </div>
            <div class="col-md-6">
              <p>
                Line ID : {{member_line_id}}<br>
                Skype ID : {{member_skype}}<br>
                What App : {{member_whatapp}}<br>
                อื่นๆ : {{member_contact_etc}}<br>
              </p>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="body bg-teal">
            บัญชีนักธุรกิจอิสระ <span class="pull-right"><b>{{AccountList.length}} รหัส</b> </span>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-12">
        <div class="card">
          <div class="body bg-teal">
            จำนวนบัญชีธุรกิจ <span class="pull-right"><b>12 รหัส</b> </span>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
