@extends('layouts.main')
@section('title', "Hệ thống PolyKids")
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-12">
            
                <!--begin::Portlet-->
                <div class="m-portlet ">
                    <div class="row">
                    <div class="m-portlet__head col-8">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title ">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text col-12">
                                    Lớp Mon Hí 
                                </h3>
                           
                            </div>
                            
                        </div>
                    </div>
                    <div class="m-portlet__head col-4">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title col-4">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <div class="col-lg-12" style="text-align: right">
                                   
                                </div>
                                <div class="col-lg-12 ml-5" style="text-align: right">
                                    <a href="#"><button type="button" class="btn btn-info .bg-info" data-toggle="modal" data-target="#m_modal_4">+ Thêm mới bài viết</button></a>
                                </div>
                           
                            </div>
                        </div>
                        <!--begin::Modal-->
						<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Bài viết mới</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form>
											<div class="form-group">
												<label for="recipient-name" class="form-control-label">Tiêu đề:</label>
												<input type="text" class="form-control" id="recipient-name">
											</div>
											<div class="form-group">
												<label for="message-text" class="form-control-label">Nội dung:</label>
												<textarea class="form-control" id="message-text"></textarea>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
										<button type="button" class="btn btn-primary">Đăng bài</button>
									</div>
								</div>
							</div>
						</div>

						<!--end::Modal-->
                    </div>
                </div>
                </div>
    
                <!--end::Portlet-->
            
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Album ảnh
                            </h3>
                        </div>
                    </div>
                </div>
               
                    <div class="m-section">
                        <div class="m-section__content">
                            <div class="col-lg-3">
                                    ddd 
                            </div>
                            <div class="col-lg-3" >
                                ddd 
                        </div>
                        </div>
                    </div>

                    <!--end::Section-->
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>
</div>
@if (session('mess'))
	<script>
		Swal.fire({
			position: 'top-center',
			icon: 'warning',
			title: 'Hiện tại bạn chưa dc xếp lớp !',
			text: 'Vui lòng liên hệ nhà trường xếp lớp',
			timer: 5000
		})
	</script>
@endif
@endsection