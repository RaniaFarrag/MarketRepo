<style>
    a.sociall img {
        width: 25px;
    }
    .checkbox-inline.company_Card label {
        display: inline-block;
        text-align: center;
    }
    .checkbox-inline .checkbox span {
        margin: auto;
    }
    .btn .badge {
        position: absolute;
        top: -1px;
        right: 0;
        color: #6993FF ;
        border: 1px solid;
        padding: 7px 5px;
        line-height: 0;
        border-radius: 50%;
    }
</style>

<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-12  subheader-transparent " id="kt_subheader">
        <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">
                        Reports View</h2>
                    <!--end::Title-->

                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                            Dashboard </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                            Reports </a>

                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->

            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->

            <!--end::Toolbar-->

        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Dashboard-->

            <div class="row">

                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom">

                        <div class="card-body">
                            <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                                            Companies Filters
                                        </div>
                                    </div>
                                    <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
                                        <div class="card-body">
                                            <div class="row fliter_serch">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Company Name</label>
                                                        <input type="text" class="form-control" placeholder="Company Name">
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Sectors</label>
                                                        <select class="form-control select2" name="param">
                                                            <option value="" selected="">Select All</option>
                                                            <option value="">Health Care</option>
                                                            <option value="">Oil & Gas</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Company Type</label>
                                                        <select class="form-control select2" name="param">
                                                            <option value="" selected="">Select All</option>
                                                            <option value="72" data-select2-id="23">Senior management of pharmacies
                                                            </option>

                                                            <option value="71" data-select2-id="24">Pharmaceutical Company</option>

                                                            <option value="70" data-select2-id="25">Medical complex</option>

                                                            <option value="69" data-select2-id="26">medical Center</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control select2" name="param">
                                                            <option value="" selected="">Select All</option>
                                                            <option value="1" data-select2-id="58">Saudi Arabia</option>
                                                            <option value="2" data-select2-id="59">United Arab Emirates</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select class="form-control select2" name="param">
                                                            <option value="" selected="">Select All</option>
                                                            <option value="1" data-select2-id="58">Saudi Arabia</option>
                                                            <option value="2" data-select2-id="59">United Arab Emirates</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Evaluation status</label>
                                                        <select class="form-control select2" name="param" multiple="multiple">
                                                            <option value="A" data-select2-id="287">A</option>
                                                            <option value="B" data-select2-id="288">B</option>
                                                            <option value="C" data-select2-id="289">C</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Communication Type</label>
                                                        <select class="form-control select2" name="param" multiple="multiple">
                                                            <option value="whats" data-select2-id="71">Whatsapp</option>
                                                            <option value="email" data-select2-id="72">Email</option>
                                                            <option value="phone" data-select2-id="73">Phone</option>
                                                            <option value="twiter" data-select2-id="74">Twitter</option>
                                                            <option value="linkedin" data-select2-id="75">Linkedin</option>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Company Status</label>
                                                        <select class="form-control select2" name="param" multiple="multiple">
                                                            <option value="is_called">Confirm Connection</option>
                                                            <option value="is_verified">Confirm Interview</option>
                                                            <option value="confirm_register">Confirm Need</option>
                                                            <option value="is_registered">Confirm Contract</option>
                                                            <option value="no_meeting">No Meeting</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Representative </label>
                                                        <select class="form-control select2" name="param">
                                                            <option value="" selected="">Select All</option>
                                                            <option value="1" data-select2-id="103">Existing</option>
                                                            <option value="0" data-select2-id="104">Not Exist</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Company Representative name </label>
                                                        <select class="form-control select2" name="param">
                                                            <option value="" selected="">Select All</option>
                                                            <option value="13471" data-select2-id="94">BABU ANSARI</option>
                                                            <option value="13473" data-select2-id="95">RAAFAT ALI</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <select class="form-control select2" name="param">
                                                            <option value="" selected="">Select All</option>
                                                            <option value="1" data-select2-id="103">Existing</option>
                                                            <option value="0" data-select2-id="104">Not Exist</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Confirm the interview</label>
                                                        <div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest">
                                                            <input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Select date & time" data-target="#kt_datetimepicker_3"/>
                                                            <div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker">
				<span class="input-group-text">
					<i class="ki ki-calendar"></i>
				</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Company Date</label>
                                                        <div class="input-group input-group-solid date" id="kt_datetimepicker_113" data-target-input="nearest">
                                                            <input type="text" class="form-control form-control-solid datetimepicker-input" placeholder="Select date & time" data-target="#kt_datetimepicker_113"/>
                                                            <div class="input-group-append" data-target="#kt_datetimepicker_113" data-toggle="datetimepicker">
				<span class="input-group-text">
					<i class="ki ki-calendar"></i>
				</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-8 col-xs-12">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <button type="button" class="btn btn-block btn-success">Search</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="separator separator-dashed mt-8 mb-5"></div>
                          <div class="row">
                              <table class="table table-bordered text-center">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Company Name</th>
                                      <th>Sector</th>
                                      <th>Company Type</th>
                                      <th>Evaluation status</th>
                                      <th>Evaluator</th>
                                      <th>Confirm Connection</th>
                                      <th>Confirm Interview</th>
                                      <th>Confirm Need</th>
                                      <th>Confirm Contract</th>


                                  </tr>
                                  </thead>

                                  <tbody>
                                  <tr>
                                      <td style="width: 34px;"><a href="#" target="_blank">2894</a></td>
                                      <td><a href="https://marketing-hc.com/acp/market/company/edit/2894">Physical Therapists Center (PTC)</a>
                                      </td>
                                      <td>Health Care
                                      </td>
                                      <td>medical Center</td>

                                      <td>B</td>
                                      <td>RAAFAT ALI</td>
                                      <td>RAAFAT ALI</td>

                                      <td>-</td>
                                      <td>-</td>

                                      <td>-</td>
                                  </tr>
                                  <tr>
                                      <td style="width: 34px;"><a href="#" target="_blank">2883</a></td>
                                      <td><a href="https://marketing-hc.com/acp/market/company/edit/2883">Med Art Clinics</a>
                                      </td>
                                      <td>Health Care
                                      </td>
                                      <td>medical Center</td>

                                      <td>C</td>
                                      <td>BABU ANSARI</td>
                                      <td>-</td>

                                      <td>BABU ANSARI</td>
                                      <td>-</td>

                                      <td>-</td>
                                  </tr>

                                  </tbody>

                              </table>


                          </div>


                        </div>
                    </div>


                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>






