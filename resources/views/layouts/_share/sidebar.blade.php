<button
    class="m-aside-left-close  m-aside-left-close--skin-dark "
    id="m_aside_left_close_btn"
>
    <i class="la la-close"></i>
</button>
<div
    id="m_aside_left"
    class="m-grid__item m-aside-left  m-aside-left--skin-light "
>
    <!-- BEGIN: Aside Menu -->
    <div
        id="m_ver_menu"
        class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-dark "
        m-menu-vertical="1"
        m-menu-scrollable="1"
        m-menu-dropdown-timeout="500"
        style="position: relative;"
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="{{ route('app') }}" class="m-menu__link "
                    ><i class="m-menu__link-icon flaticon-line-graph"></i
                    ><span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Trang chủ</span>
                            <span class="m-menu__link-badge"
                                ><span class="m-badge m-badge--danger"
                                    >2</span
                                ></span
                            >
                        </span></span
                    ></a
                >
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Danh mục</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li
                class="m-menu__item  m-menu__item--submenu"
                aria-haspopup="true"
                m-menu-submenu-toggle="hover"
            >
                <a href="javascript:;" class="m-menu__link m-menu__toggle"
                    ><i class="m-menu__link-icon flaticon-layers"></i
                    ><span class="m-menu__link-text">Thông báo & Tin tức</span
                    ><i class="m-menu__ver-arrow la la-angle-right"></i
                ></a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li
                            class="m-menu__item  m-menu__item--parent"
                            aria-haspopup="true"
                        >
                            <span class="m-menu__link"
                                ><span class="m-menu__link-text"
                                    >Base</span
                                ></span
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a
                                href="components/base/state.html"
                                class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text"
                                    >Đăng tải thông báo</span
                                ></a
                            >
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="m-menu__item  m-menu__item--submenu"
                aria-haspopup="true"
                m-menu-submenu-toggle="hover"
            >
                <a href="javascript:;" class="m-menu__link m-menu__toggle"
                    ><i class="m-menu__link-icon flaticon-layers"></i
                    ><span class="m-menu__link-text">Công việc hằng ngày</span
                    ><i class="m-menu__ver-arrow la la-angle-right"></i
                ></a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li
                            class="m-menu__item  m-menu__item--parent"
                            aria-haspopup="true"
                        >
                            <span class="m-menu__link"
                                ><span class="m-menu__link-text"
                                    >Công việc hằng ngày</span
                                ></span
                            >
                        </li>
                        <li
                            class="m-menu__item  m-menu__item--submenu"
                            aria-haspopup="true"
                            m-menu-submenu-toggle="hover"
                        >
                            <a
                                href="javascript:;"
                                class="m-menu__link m-menu__toggle"
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text">Điểm danh</span
                                ><i
                                    class="m-menu__ver-arrow la la-angle-right"
                                ></i
                            ></a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li
                                        class="m-menu__item "
                                        aria-haspopup="true"
                                    >
                                        <a
                                            href="{{
                                                route(
                                                    'diem_danh_ban_sang.create'
                                                )
                                            }}"
                                            class="m-menu__link "
                                            ><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"
                                                ><span></span></i
                                            ><span class="m-menu__link-text"
                                                >Điểm danh đến</span
                                            ></a
                                        >
                                    </li>
                                    <li
                                        class="m-menu__item "
                                        aria-haspopup="true"
                                    >
                                        <a
                                            href="{{
                                                route('diem_danh_ve.create')
                                            }}"
                                            class="m-menu__link "
                                            ><i
                                                class="m-menu__link-bullet m-menu__link-bullet--dot"
                                                ><span></span></i
                                            ><span class="m-menu__link-text"
                                                >Điểm danh về</span
                                            ></a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('test4') }}" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text"
                                    >Đơn nghỉ học</span
                                ></a
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('test5') }}" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text"
                                    >Đơn dặn thuốc</span
                                ></a
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('test6') }}" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text"
                                    >Lời nhắn</span
                                ></a
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('test7') }}" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text"
                                    >Hoạt động</span
                                ></a
                            >
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="m-menu__item  m-menu__item--submenu"
                aria-haspopup="true"
                m-menu-submenu-toggle="hover"
            >
                <a href="javascript:;" class="m-menu__link m-menu__toggle"
                    ><i class="m-menu__link-icon flaticon-share"></i
                    ><span class="m-menu__link-text">Sức khỏe</span
                    ><i class="m-menu__ver-arrow la la-angle-right"></i
                ></a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text"
                                    >Biểu đồ tăng trưởng</span
                                ></a
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text">item</span></a
                            >
                        </li>
                    </ul>
                </div>
            </li>

            <li
                class="m-menu__item  m-menu__item--submenu"
                aria-haspopup="true"
                m-menu-submenu-toggle="hover"
            >
                <a href="javascript:;" class="m-menu__link m-menu__toggle"
                    ><i class="m-menu__link-icon flaticon-web"></i
                    ><span class="m-menu__link-text">Quản lý danh sách lớp</span
                    ><i class="m-menu__ver-arrow la la-angle-right"></i
                ></a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li
                            class="m-menu__item  m-menu__item--parent"
                            aria-haspopup="true"
                        >
                            <span class="m-menu__link"
                                ><span class="m-menu__link-text"
                                    >Buttons</span
                                ></span
                            >
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('danh-sach-lop-index') }}" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text">Danh sách lớp</span></a
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="" class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text">item</span></a
                            >
                        </li>
                    </ul>
                </div>
            </li>

            <li
                class="m-menu__item  m-menu__item--submenu"
                aria-haspopup="true"
                m-menu-submenu-toggle="hover"
            >
                <a href="javascript:;" class="m-menu__link m-menu__toggle"
                    ><i class="m-menu__link-icon flaticon-interface-1"></i
                    ><span class="m-menu__link-text">Giáo trình</span
                    ><i class="m-menu__ver-arrow la la-angle-right"></i
                ></a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li
                            class="m-menu__item  m-menu__item--parent"
                            aria-haspopup="true"
                        >
                            <span class="m-menu__link"
                                ><span class="m-menu__link-text"
                                    >item</span
                                ></span
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a
                                href="{{ route('quan-ly-hoc-sinh-index') }}"
                                class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text">item</span></a
                            >
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a
                                href="{{ route('quan-ly-hoc-sinh-create') }}"
                                class="m-menu__link "
                                ><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"
                                    ><span></span></i
                                ><span class="m-menu__link-text">item</span></a
                            >
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>
