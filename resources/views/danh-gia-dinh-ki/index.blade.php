@extends('layouts.main')
@section('title', "Đánh giá định kì")
@section('content')
<div class="m-content">
    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible " role="alert">
        <div class="m-alert__icon">
        </div>
        <div class="m-alert__text d-flex justify-content-center">
          <h3>LỚP HOA LY 2</h3>
        </div>
      </div> 
      <div class="row">
        <div class="col-md-8">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__body">
                    <div id="table-hoc-sinh_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"><div id="table-hoc-sinh_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="table-hoc-sinh"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="table-hoc-sinh" class="table table-striped table-bordered m-table thong-tin-hoc-sinh-cua-lop no-footer dataTable" role="grid" aria-describedby="table-hoc-sinh_info" style="">
                        <thead>
                          <tr role="row"><th style="width: 33.1px;" class="sorting_asc" rowspan="1" colspan="1" aria-label=""><input type="checkbox" id="" onclick="checkAll(this)"></th><th style="width: 74.7px;" class="sorting" tabindex="0" aria-controls="table-hoc-sinh" rowspan="1" colspan="1" aria-label="Stt: activate to sort column ascending">Stt</th><th style="width: 117.1px;" class="sorting" tabindex="0" aria-controls="table-hoc-sinh" rowspan="1" colspan="1" aria-label="Mã học sinh: activate to sort column ascending">Mã học sinh</th><th style="width: 158.7px;" class="sorting" tabindex="0" aria-controls="table-hoc-sinh" rowspan="1" colspan="1" aria-label="Họ tên: activate to sort column ascending">Họ tên</th><th style="width: 117.1px;" class="sorting" tabindex="0" aria-controls="table-hoc-sinh" rowspan="1" colspan="1" aria-label="Ngày sinh: activate to sort column ascending">Ảnh</th></tr>
                        </thead>
                        <thead class="filter">
                          <tr>
                            <td scope="row"><input class="form-control search m-input  " type="hidden"></td>
                            <td scope="row"><input class="form-control search m-input " type="hidden"></td>
                            <td scope="row"><input class="form-control search m-input search-mahs" type="text"></td>
                            <td scope="row"><input class="form-control search m-input search-ten" type="text"></td>
                            <td scope="row"><input class="form-control search m-input search-ngaysinh" type="text"></td>
                            
            
                            
                            
                          </tr>
                        </thead>
                        <tbody id="show-data-hoc-sinh">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <tr role="row" class="odd">
                          <th class="sorting_1"><input class="checkbox" type="checkbox" id_hs="501"></th>
                          <th scope="row">1</th>
                          <td>PH8021</td>
                          <td>Kade Denesik</td>
                          <td>2015-07-08</td>
                           
                        </tr><tr role="row" class="even">
                          <th class="sorting_1"><input class="checkbox" type="checkbox" id_hs="502"></th>
                          <th scope="row">2</th>
                          <td>PH1058</td>
                          <td>Abdul Macejkovic</td>
                          <td>2001-01-10</td>
                          
                        </tr><tr role="row" class="odd">
                          <th class="sorting_1"><input class="checkbox" type="checkbox" id_hs="503"></th>
                          <th scope="row">3</th>
                          <td>PH8943</td>
                          <td>Ms. Cathrine Mayert</td>
                          <td>1993-04-04</td>
                            
                        </tr></tbody>
                      </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="table-hoc-sinh_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div></div><div class="col-sm-12 col-md-7"></div></div></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__body">
                    
                </div>
            </div>
        </div>      
    </div>   
</div>
@endsection
