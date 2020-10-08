@extends('layouts.main') @section('title', 'Lịch sử thông báo') @section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">

            <!--begin:: Widgets/Best Sellers-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                THÔNG BÁO
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills m-portlet__nav nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                               
                                <a href="#" class="btn btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                    <i class="la la-pencil-square text-black"></i>
                                </a>
                                <div class="m-dropdown__wrapper" style="z-index: 101;">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__item">
                                                    <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">Gửi toàn trường</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">Gửi giáo viên</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">Gửi phụ huynh</span>
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Content-->
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_widget5_tab1_content" aria-expanded="true">
                            <!--begin::m-widget3-->
                            @foreach ($data as $item )
                                <div class="m-widget3">
                                    <div class="m-widget3__item">
                                        <div class="m-widget3__header">
                                            <div class="m-widget3__user-img">
                                                <img class="m-widget3__img" src="../../assets/app/media/img/users/user1.jpg" alt="">
                                            </div>
                                            <div class="m-widget3__info">
                                                <span class="m-widget3__username">
                                                    {{ $item->Auth->name}}
                                                </span><br>
                                                <span class="m-widget3__time">
                                                    2 day ago
                                                </span>
                                            </div>
                                        <a href="{{ route('thong-bao.show',['id'=>$item->id]) }}" class="m-widget3__status m--font-info">
                                                Xem
                                            </a>
                                        </div>
                                        <div class="m-widget3__body">
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    {{ $item->title}}
                                                </h4>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        {{ $item->Auth->name}}
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        {{ $item->created_at}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <!--end::m-widget3-->
                        </div>
                    </div>

                    <!--end::Content-->
                </div>
            </div>

            <!--end:: Widgets/Best Sellers-->
        </div>
    </div>
</div>
@endsection
