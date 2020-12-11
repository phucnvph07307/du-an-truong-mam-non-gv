@extends('layouts.main') @section('title', 'Lịch sử thông báo') @section('content')
<div class="m-content">

    <!--Begin::Section-->
    <div class="row">

        <div class="col-xl-12">

            <!--begin:: Widgets/New Users-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Thông Báo
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link"  href="{{ route('thong-bao.index') }}">
                                    Đã nhận
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget4_tab2_content" role="tab" aria-selected="true">
                                    Đã gửi
                                </a>
                            </li>
                        </ul>
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                                    <i class="la la-ellipsis-h m--font-brand"></i>
                                </a>
                                <div class="m-dropdown__wrapper" style="z-index: 101;">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__item">
                                                        <a href="{{ route('thong-bao.create')}}" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-notes"></i>
                                                            <span class="m-nav__link-text">Gửi thông báo</span>
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
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_widget4_tab2_content">
                            @foreach ($thongBaoDaGui as $item )
                            <div class="m-widget3">
                                <div class="m-widget3__item">
                                    <div class="m-widget3__header">
                                        <div class="m-widget3__user-img">
                                            <img class="m-widget3__img" src="{{ Auth::user()->avatar ? Auth::user()->avatar : 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&background=random' }}">
                                        </div>
                                        <div class="m-widget3__info">
                                            <span class="m-widget3__username">
                                                {{ $item->Auth->name}}
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="{{ route('thong-bao.showThongBaoGuiDi',['id'=>$item->id]) }}" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">
                                                Xem
                                            </a>
                                        </div>
                                    </div>
                                    <div class="m-widget3__body">
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                {{ $item->title}}
                                            </h4>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Người gửi:
                                                </span>
                                                <span class="m-widget5__info-author m--font-info">
                                                    {{ $item->Auth->name}}
                                                </span>
                                                <span class="m-widget5__info-label">
                                                    Ngày:
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
                        <div class="m-portlet__foot d-flex justify-content-end">
                            {{ $thongBaoDaGui->links() }}
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/New Users-->
        </div>
    </div>

    <!--End::Section-->

    
</div>
@endsection