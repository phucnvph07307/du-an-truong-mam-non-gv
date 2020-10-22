@extends('layouts.main')
@section('title', "Thông tin cá nhân")
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
												<div class="m-card-profile__pic-wrapper">
													<img src="../assets/app/media/img/users/user4.jpg" alt="" />
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
															<span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
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
													<div class="form-group m-form__group m--margin-top-10 m--hide">
														<div class="alert m-alert m-alert--default" role="alert">
															The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
														</div>
													</div>
													<div class="form-group m-form__group row" id="thongtincanhan">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">Thông tin cá nhân</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Họ và tên</label>
														<div class="col-7">
														<input class="form-control m-input border-0" type="text" value="{{ Auth::user()->name }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Ngày sinh</label>
														<div class="col-7">
															<input class="form-control m-input border-0" type="text" value="{{ Auth::user()->profile->ngay_sinh }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Giới tính</label>
														<div class="col-7">
															<input class="form-control m-input border-0" type="text" value="{{ Auth::user()->profile->gioi_tinh == 1 ? 'Nam' :'Nữ' }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Phone</label>
														<div class="col-7">
															<input class="form-control m-input border-0" type="text" value="{{ Auth::user()->profile->dien_thoai }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Địa chỉ</label>
														<div class="col-7">
															<input class="form-control m-input border-0" type="text" value="{{ Auth::user()->profile->dien_thoai }}">
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
															<input class="form-control m-input border-0" type="text" value="{{ Auth::user()->profile->chuyen_mon }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Năm tốt nghiệp</label>
														<div class="col-7">
															<input class="form-control m-input border-0" type="text" value="{{ Auth::user()->profile->nam_tot_nghiep }}">
														</div>
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2">
															</div>
															<div class="col-7">
																<button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
															</div>
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
</script>
@endsection