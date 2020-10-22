@extends('layouts.main')
@section('title', "Trang chủ")
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">Dashboard</h3>
        </div>
        <div>
            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                <span class="m-subheader__daterange-label">
                    <span class="m-subheader__daterange-title"></span>
                    <span class="m-subheader__daterange-date m--font-brand"></span>
                </span>
                <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                    <i class="la la-angle-down"></i>
                </a>
            </span>
        </div>
    </div>
</div>
<div class="m-content">
  <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible " role="alert">
    <div class="m-alert__icon">
    </div>
    <div class="m-alert__text d-flex justify-content-center">
      <h3>LỚP HOA LY 2</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Điểm danh</div>
              <div class="h5 mb-0 font-weight-bold text-red-800">10</div>
            </div>
            <div class="col-auto">
              <i class="
                  flaticon-list  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Đơn nghỉ học</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
            </div>
            <div class="col-auto">
              <i class="flaticon-interface-10 fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dặn thuốc</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="flaticon-statistics  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hoạt động học</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="flaticon-folder-1  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-xl-8">
      <div class="m-portlet m-portlet--mobile ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Danh sách học sinh
              </h3>
            </div>
          </div>
          <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
              <li class="m-portlet__nav-item">
                <div
                  class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                  m-dropdown-toggle="hover" aria-expanded="true">
                  <a href="#"
                    class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                    <i class="la la-ellipsis-h m--font-brand"></i>
                  </a>

                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-portlet__body">

          <!--begin: Datatable -->
          <div id="m_table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="m_table_2_length"><label>Show <select name="m_table_2_length"
                      aria-controls="m_table_2" class="custom-select custom-select-sm form-control form-control-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> entries</label></div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div id="m_table_2_filter" class="dataTables_filter"><label>Search:<input type="search"
                      class="form-control form-control-sm" placeholder="" aria-controls="m_table_2"></label></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="dataTables_scroll">
                  <div class="dataTables_scrollHead"
                    style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                    <div class="dataTables_scrollHeadInner"
                      style="box-sizing: content-box; width: 2280.8px; padding-right: 17px;">
                      <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer"
                        role="grid" style="margin-left: 0px; width: 2280.8px;">

                      </table>
                    </div>
                  </div>
                  <div class="dataTables_scrollBody"
                    style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer"
                      id="m_table_2" role="grid" aria-describedby="m_table_2_info" style="width: 2351px;">
                      <thead>
                        <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                            style="width: 46.45px;" aria-sort="ascending"
                            aria-label="Record ID: activate to sort column descending">Stt</th>
                          <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                            style="width: 37.65px;" aria-label="Order ID: activate to sort column ascending">Mã học sinh
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                            style="width: 52.85px;" aria-label="Ship Country: activate to sort column ascending">Họ tên
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                            style="width: 46.45px;" aria-label="Ship City: activate to sort column ascending">Ảnh</th>
                          <th class="sorting" tabindex="0" aria-controls="m_table_2" rowspan="1" colspan="1"
                            style="width: 56.85px;" aria-label="Ship Name: activate to sort column ascending">Ngày sinh
                          </th>

                          <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 70.1px;"
                            aria-label="Actions">Actions</th>
                        </tr>
                      </thead>

                      <tbody>


                        <tr role="row" class="odd">
                          <td class="sorting_1">1</td>
                          <td>PH0001</td>
                          <td>Nguyễn Thị Na</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>
                          <td>1/1/2018</td>



                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">2</td>
                          <td>PH0002</td>
                          <td>Nguyễn Thị Bưởi</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>
                          <td>2/2/2018</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">3</td>
                          <td>PH0222</td>
                          <td>Nguyễn Thị Táo</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>3/5/2018</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                              </div>
                            </span>
                            <a href="#"
                              class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                              title="View">
                              <i class="la la-edit"></i>
                            </a></td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">4</td>
                          <td>PH0005</td>
                          <td>Nguyễn Thị Mít</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>4/8/2018</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">5</td>
                          <td>31722-529</td>
                          <td>AT</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>Stehr-Kunde</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">6</td>
                          <td>64117-168</td>
                          <td>CN</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>O'Hara LLC</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">7</td>
                          <td>43857-0331</td>
                          <td>CN</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>Lebsack Group</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">8</td>
                          <td>64980-196</td>
                          <td>HR</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>Gutkowski LLC</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="odd">
                          <td class="sorting_1">9</td>
                          <td>0404-0360</td>
                          <td>CO</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>Bartoletti, Howell and Jacobson</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                        <tr role="row" class="even">
                          <td class="sorting_1">10</td>
                          <td>52125-267</td>
                          <td>TH</td>
                          <td><img width="100px" height="100px"
                              src="https://images.unsplash.com/photo-1601758004584-903c2a9a1abc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                              alt=""></td>

                          <td>Schroeder-Champlin</td>

                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>

                            </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="m_table_2_info" role="status" aria-live="polite">Showing 1 to 10 of 50
                  entries</div>
              </div>
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="m_table_2_paginate">
                  <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="m_table_2_previous"><a href="#"
                        aria-controls="m_table_2" data-dt-idx="0" tabindex="0" class="page-link"><i
                          class="la la-angle-left"></i></a></li>
                    <li class="paginate_button page-item active"><a href="#" aria-controls="m_table_2" data-dt-idx="1"
                        tabindex="0" class="page-link">1</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="2"
                        tabindex="0" class="page-link">2</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="3"
                        tabindex="0" class="page-link">3</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="4"
                        tabindex="0" class="page-link">4</a></li>
                    <li class="paginate_button page-item "><a href="#" aria-controls="m_table_2" data-dt-idx="5"
                        tabindex="0" class="page-link">5</a></li>
                    <li class="paginate_button page-item next" id="m_table_2_next"><a href="#" aria-controls="m_table_2"
                        data-dt-idx="6" tabindex="0" class="page-link"><i class="la la-angle-right"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!--end: Datatable -->
        </div>
      </div>
    </div>
    <div class="col-xl-4">

      <!--begin:: Widgets/Audit Log-->
      <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Tin tức
              </h3>
            </div>
          </div>
          <div class="m-portlet__head-tools">
            <ul
              class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
              role="tablist">
              <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
                  Tron
                </a>
              </li>
              <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
                  Week
                </a>
              </li>
              <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab3_content" role="tab">
                  Month
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-portlet__body">
          <div class="tab-content">
            <div class="tab-pane active" id="m_widget4_tab1_content">
              <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400"
                style="height: 400px; overflow: hidden;">
                <div class="m-list-timeline m-list-timeline--skin-light">
                  <div class="m-list-timeline__items">
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                      <span class="m-list-timeline__text">12 new users registered</span>
                      <span class="m-list-timeline__time">Just now</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                      <span class="m-list-timeline__text">System shutdown <span
                          class="m-badge m-badge--success m-badge--wide">pending</span></span>
                      <span class="m-list-timeline__time">14 mins</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                      <span class="m-list-timeline__text">New invoice received</span>
                      <span class="m-list-timeline__time">20 mins</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                      <span class="m-list-timeline__text">DB overloaded 80% <span
                          class="m-badge m-badge--info m-badge--wide">settled</span></span>
                      <span class="m-list-timeline__time">1 hr</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                      <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                      <span class="m-list-timeline__time">2 hrs</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                      <span class="m-list-timeline__text">Production server down</span>
                      <span class="m-list-timeline__time">3 hrs</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                      <span class="m-list-timeline__text">Production server up</span>
                      <span class="m-list-timeline__time">5 hrs</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                      <span href="" class="m-list-timeline__text">New order received <span
                          class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                      <span class="m-list-timeline__time">7 hrs</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                      <span class="m-list-timeline__text">12 new users registered</span>
                      <span class="m-list-timeline__time">Just now</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                      <span class="m-list-timeline__text">System shutdown <span
                          class="m-badge m-badge--success m-badge--wide">pending</span></span>
                      <span class="m-list-timeline__time">14 mins</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                      <span class="m-list-timeline__text">New invoice received</span>
                      <span class="m-list-timeline__time">20 mins</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                      <span class="m-list-timeline__text">DB overloaded 80% <span
                          class="m-badge m-badge--info m-badge--wide">settled</span></span>
                      <span class="m-list-timeline__time">1 hr</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                      <span class="m-list-timeline__text">New invoice received</span>
                      <span class="m-list-timeline__time">20 mins</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                      <span class="m-list-timeline__text">DB overloaded 80% <span
                          class="m-badge m-badge--info m-badge--wide">settled</span></span>
                      <span class="m-list-timeline__time">1 hr</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                      <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                      <span class="m-list-timeline__time">2 hrs</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                      <span class="m-list-timeline__text">Production server down</span>
                      <span class="m-list-timeline__time">3 hrs</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                      <span class="m-list-timeline__text">Production server up</span>
                      <span class="m-list-timeline__time">5 hrs</span>
                    </div>
                    <div class="m-list-timeline__item">
                      <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                      <span href="" class="m-list-timeline__text">New order received <span
                          class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                      <span class="m-list-timeline__time">7 hrs</span>
                    </div>
                  </div>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                  <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 400px; right: 4px;">
                  <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 248px;"></div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="m_widget4_tab2_content">
            </div>
            <div class="tab-pane" id="m_widget4_tab3_content">
            </div>
          </div>
        </div>
      </div>

      <!--end:: Widgets/Audit Log-->
    </div>
  </div>

  <div class="m-portlet">
    <div class="m-portlet__body">
      <div class="row">
        <div class="col-10">
          <h3 class="m-section__heading">Album ảnh</h3>

        </div>
        <div class="col-2 pl-5">
          <a href="#" class="btn btn-outline-accent btn-sm 	m-btn m-btn--icon m-btn--pill ml-5">
            <span>
              <i class="fa flaticon-apps"></i>
              <span>Xem tất cả</span>
            </span>
          </a>
        </div>
      </div>
      <div class="col-12 form-group m-form__group d-flex justify-content-end">
        <div class="row row-cols-4">
          <div class="col">
            <img
              src="https://images.pexels.com/photos/4925891/pexels-photo-4925891.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
              alt="..." class="img-thumbnail">
          </div>
          <div class="col">
            <img
              src="https://images.pexels.com/photos/4925891/pexels-photo-4925891.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
              alt="..." class="img-thumbnail">
          </div>
          <div class="col">
            <img
              src="https://images.pexels.com/photos/4925891/pexels-photo-4925891.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
              alt="..." class="img-thumbnail">
          </div>
          <div class="col">
            <img
              src="https://images.pexels.com/photos/4925891/pexels-photo-4925891.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
              alt="..." class="img-thumbnail">
          </div>
        </div>
      </div>



    </div>

  </div>
</div>
@endsection 
