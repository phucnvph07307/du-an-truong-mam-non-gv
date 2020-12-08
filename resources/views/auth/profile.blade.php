@extends('layouts.main')
@section('title', "Thông tin cá nhân")
@section('style')
<link rel="stylesheet" href="{{ asset('change_avatar/change_avatar.css')}}">
@endsection
@section('content')
<div class="m-content">
						<div class="row">
							<div class="col-xl-3 col-lg-4">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body">
										<div class="m-card-profile">
											<div class="m-card-profile__title m--hide">
												Your Profile
											</div>
											<div class="m-card-profile__pic">
												<div class="image-input image-input-outline image-input-circle" id="kt_image_3">
													<div class="image-input-wrapper"
														style="background-image: url('{{ Auth::user()->avatar}}'), url('https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random')">
													</div>
													<label
														class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
														data-action="change" data-toggle="tooltip" title=""
														data-original-title="Change avatar">
														<i class="la la-pencil text-muted"></i>
														<input type="file" name="profile_avatar"
															accept="image/*" onchange="changeAvatar(this)">
														<input type="hidden" name="profile_avatar_remove">
													</label>
												</div>
											</div>
											<div class="m-card-profile__details">
												<span class="m-card-profile__name">{{ Auth::user()->name}}</span>
												<a href="javascript:;" class="m-card-profile__email m-link">{{ Auth::user()->email}}</a>
											</div>
										</div>
										<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
											<li class="m-nav__separator m-nav__separator--fit"></li>
											<li class="m-nav__section m--hide">
												<span class="m-nav__section-text">Section</span>
											</li>
											<li class="m-nav__item">
												<a href="#thongtincanhan" class="m-nav__link" id="target_thongtincanhan">
													<i class="m-nav__link-icon flaticon-profile-1"></i>
													<span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">Thông tin cá nhân</span>
														</span>
													</span>
												</a>
											</li>
											<li class="m-nav__item">
												<a href="#hocvan" class="m-nav__link" id="target_hocvan">
													<i class="m-nav__link-icon flaticon-share"></i>
													<span class="m-nav__link-text">Học vấn</span>
												</a>
											</li>
											<li class="m-nav__item">
                                                        <a href="{{route('doi-mat-khau')}}" class="m-nav__link">
                                                            <i class="m-nav__link-icon  flaticon-lock"></i>
                                                            <span class="m-nav__link-text">Đổi mật khẩu</span>
                                                        </a>
                                                    </li>
										</ul>
										<div class="m-portlet__body-separator"></div>
										
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-8">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
									<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
														Thông tin
													</a>
												</li>
												
												
											</ul>
										</div>
									
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
											<form class="m-form m-form--fit m-form--label-align-right">
												<div class="m-portlet__body">
													<div class="form-group m-form__group row" id="thongtincanhan">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">Thông tin cá nhân</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Họ và tên</label>
														<div class="col-7">
														<input class="form-control m-input border-0" disabled type="text" value="{{$giao_vien->ten}}">
														</div>
													</div>
													
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Ngày sinh</label>
														<div class="col-7">
															<input class="form-control m-input border-0" disabled type="text" value="{{$giao_vien->ngay_sinh }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Giới tính</label>
														<div class="col-7">
															<input class="form-control m-input border-0" disabled type="text" value="{{ $giao_vien->gioi_tinh == 0 ? 'Nam' :'Nữ' }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Phone</label>
														<div class="col-7">
															<input class="form-control m-input border-0" disabled type="text" value="{{ $giao_vien->dien_thoai }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Địa chỉ</label>
														<div class="col-7">
															<input class="form-control m-input border-0"disabled type="text" value="{{ $giao_vien->noi_o_hien_tai_so_nha }}">
														</div>
													</div>
													<span id="hocvan"></span>
													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x" ></div>
													<div class="form-group m-form__group row" >
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">Học vấn</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Chuyên môn</label>
														<div class="col-7">
															<input class="form-control m-input border-0"disabled type="text" value="{{ $giao_vien->chuyen_mon }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Năm tốt nghiệp</label>
														<div class="col-7">
															<input class="form-control m-input border-0" disabled type="text" value="{{ $giao_vien->nam_tot_nghiep }}">
														</div>
													</div>
												</div>
												
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2">
															</div>
															<!-- <div class="col-7">
																<button type="button" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
															</div> -->
														</div>
													</div>
												</div>
											</form>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
@section('script')
<script src="{{ asset('change_avatar/scripts.bundle.js')}}"></script>
<script src="{{ asset('change_avatar/image-input.js')}}"></script>
<script>
	$("#target_thongtincanhan").click(function() {
		$([document.documentElement, document.body]).animate({
			scrollTop: $("#thongtincanhan").offset().top
		}, 2000);
	});
	$("#target_hocvan").click(function() {
		$([document.documentElement, document.body]).animate({
			scrollTop: $("#hocvan").offset().top
		}, 2000);
	});

	function changeAvatar(file){
        let srcAvatar = URL.createObjectURL(file.files[0]);
		$(".error_avatar").attr("src", srcAvatar);
		var form = new FormData();
            form.append("image", file.files[0]);
            $.ajax({
                "url": "https://api.imgbb.com/1/upload?key=87b235f7be4c2a2271db6c21bbf93bda",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            }).done(function (response) {
                let rs = JSON.parse(response);
                let url = rs.data.display_url;
				axios.post("{{ route('upload-avatar')}}",{"avatar": url})
				.then(res => {
				})
            });
	}
</script>
@endsection