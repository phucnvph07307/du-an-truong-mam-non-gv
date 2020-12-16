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
                                <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget4_tab1_content" role="tab" aria-selected="true">
                                    Đã nhận
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link"  href="{{ route('thong-bao.da-gui') }}">
                                    Đã gửi
                                </a>
                            </li>
                        </ul>
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="{{ route('thong-bao.create')}}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                                    <i class="la la-edit"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_widget4_tab1_content">

                            @foreach ($data as $item )
                                <div class="m-widget3">
                                    <div class="m-widget3__item">
                                        <div class="m-widget3__header">
                                            <div class="m-widget3__user-img">
                                                <img class="m-widget3__img" src="{{ 'https://ui-avatars.com/api/?name=' . $item->NoiDungThongBao->Auth->name . '&background=random' }}">
                                            </div>
                                            <div class="m-widget3__info">
                                                <span class="m-widget3__username">
                                                    {{ $item->NoiDungThongBao->Auth->name}}
                                                </span>
                                            </div>
                                            <div class="m-widget4__ext">
                                                <a href="{{ route('thong-bao.show',['id'=>$item->NoiDungThongBao->id]) }}" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">
                                                    Xem
                                                </a>
                                            </div>
                                        </div>
                                        <div class="m-widget3__body">
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    {{ $item->NoiDungThongBao->title}}
                                                </h4>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Người gửi:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        {{ $item->NoiDungThongBao->Auth->name}}
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Ngày:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        {{ $item->NoiDungThongBao->created_at}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <hr>
                            @endforeach
                            <div class="m-portlet__foot d-flex justify-content-end">
                                {{ $data->links() }}
                            </div>
                            <!--end::Widget 14-->
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