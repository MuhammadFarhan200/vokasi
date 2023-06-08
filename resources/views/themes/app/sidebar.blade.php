@php
    $logo = \App\Models\Setting\Logo::where('is_active', 1)->first();
    $logo_thumbnail = null;
    if ($logo) {
        $logo_thumbnail = $logo->thumbnail ? Storage::url($logo->thumbnail) : null;
    }
@endphp

<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{route('office.dashboard.index')}}" class="menu-link text-dark">
            <div class="d-flex align-items-center app-sidebar-logo-default">
                <img alt="Logo" src="{{ $logo_thumbnail ?? asset('web/images/logodel.png') }}" class="h-30px app-sidebar-logo-default" />
                <div class="text-dark">
                    <div class="app-sidebar-logo-default text-uppercase ms-4">{{ $logo->faculty ?? 'Fakultas Vokasi' }}</div>
                    <div class="app-sidebar-logo-default ms-4">{{ $logo->university ?? 'Institut Teknologi Del' }}</div>
                </div>
            </div>
            <img alt="Logo" src="{{ $logo_thumbnail ?? asset('web/images/logodel.png') }}" class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/Dashboard')) || request()->is(Str::lower('office/Dashboard').'/*') ? 'active' : ''}}" href="{{route('office.dashboard.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-abstract-28"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @if (auth()->user()->role == '1')
                 <!--begin:Menu item-->
                 <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Web Pages Menu</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/appearance/carousel')) || request()->is(Str::lower('office/appearance/carousel').'/*') ? 'active' : ''}}" href="{{route('office.appearance.carousel.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-slider-vertical-2"></i>
                        </span>
                        <span class="menu-title">Carousel</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu link-->
                <!--begin:Menu link-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{(request()->is(Str::lower('office/appearance*')) && !request()->is(Str::lower('office/appearance/carousel*')) && !request()->is(Str::lower('office/appearance/web-footer'))) ? 'here show' : ''}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-home"></i>
                        </span>
                        <span class="menu-title">Menu Beranda</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{request()->is(Str::lower('office/appearance/breaking-news-section')) || request()->is(Str::lower('office/appearance/breaking-news-section').'/*') ? 'active' : ''}}" href="{{route('office.appearance.breaking-news-section.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Berita Terkini</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/appearance/civitas-section')) || request()->is(Str::lower('office/appearance/civitas-section').'/*') ? 'active' : ''}}" href="{{route('office.appearance.civitas-section.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Civitas Fakultas</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/appearance/faculty-explore-section')) || request()->is(Str::lower('office/appearance/faculty-explore-section').'/*') ? 'active' : ''}}" href="{{route('office.appearance.faculty-explore-section.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Eksplor Fakultas</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/appearance/study-program-section')) || request()->is(Str::lower('office/appearance/study-program-section').'/*') ? 'active' : ''}}" href="{{route('office.appearance.study-program-section.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Temukan Program Studi</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/appearance/meet-our-students-section')) || request()->is(Str::lower('office/appearance/meet-our-students-section').'/*') ? 'active' : ''}}" href="{{route('office.appearance.meet-our-students-section.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Temui Mahasiswa</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                 <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/appearance/web-footer')) || request()->is(Str::lower('office/appearance/web-footer').'/*') ? 'active' : ''}}" href="{{route('office.appearance.web-footer.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-subtitle"></i>
                        </span>
                        <span class="menu-title">Web Footer</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu link-->
                @endif
                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Main Menu</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                @if (auth()->user()->role == '1')
                 <!--begin:Menu item-->
                 <div class="menu-item d-none">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/setting/role')) || request()->is(Str::lower('office/setting/role').'/*') ? 'active' : ''}}" href="{{route('office.setting.role.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-setting"></i>
                        </span>
                        <span class="menu-title">Role</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is('office/account/*') || request()->is('office/civitas/*') ? 'here show' : ''}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-profile-user"></i>
                        </span>
                        <span class="menu-title">Akun</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is(Str::lower('office/account/himpunan*')) || request()->is(Str::lower('office/account/category-himpunan*')) ? 'here show' : ''}}">
                                <!--begin:Menu link-->
                                <span class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Himpunan</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link {{request()->is(Str::lower('office/account/category-himpunan')) || request()->is(Str::lower('office/account/category-himpunan').'/*') ? 'active' : ''}}" href="{{route('office.account.category-himpunan.index')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Kategori</span>
                                        </a>
                                        <a class="menu-link {{request()->is(Str::lower('office/account/himpunan*')) ? 'active' : ''}}" href="{{route('office.account.himpunan.index')}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">List Himpunan</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is(Str::lower('office/civitas')) || request()->is(Str::lower('office/civitas').'/*') ? 'here show' : ''}}">
                                <!--begin:Menu link-->
                                <span class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Civitas</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is(Str::lower('office/civitas/dosen*')) || request()->is(Str::lower('office/civitas/category-dosen*')) ? 'here show' : ''}}">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Dosen</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link {{request()->is(Str::lower('office/civitas/category-dosen*')) ? 'active' : ''}}" href="{{route('office.civitas.category-dosen.index')}}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Kategori</span>
                                                    </a>
                                                    <a class="menu-link {{request()->is(Str::lower('office/civitas/dosen*')) ? 'active' : ''}}" href="{{route('office.civitas.dosen.index')}}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">List Dosen</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu link-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is(Str::lower('office/civitas/staff*')) || request()->is(Str::lower('office/account/category-staff*')) ? 'here show' : ''}}">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Staff</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link {{request()->is(Str::lower('office/civitas/category-staff*')) ? 'active' : ''}}" href="{{route('office.civitas.category-staff.index')}}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Kategori</span>
                                                    </a>
                                                    <a class="menu-link {{request()->is(Str::lower('office/civitas/staff*')) ? 'active' : ''}}" href="{{route('office.civitas.staff.index')}}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">List Staff</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu item-->
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/timeline/news')) || request()->is(Str::lower('office/timeline/news').'/*') ? 'active' : ''}}" href="{{route('office.timeline.news.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-document"></i>
                        </span>
                        <span class="menu-title">Berita</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is(Str::lower('office/about')) || request()->is(Str::lower('office/about').'/*') ? 'here show' : ''}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-information-5"></i>
                        </span>
                        <span class="menu-title">Tentang Kami</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{request()->is(Str::lower('office/about/vision')) || request()->is(Str::lower('office/about/vision').'/*') ? 'active' : ''}}" href="{{route('office.about.vision.index')}}">
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Visi dan Misi</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/about/history')) || request()->is(Str::lower('office/about/history').'/*') ? 'active' : ''}}" href="{{route('office.about.history.index')}}">
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sejarah</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/about/organization')) || request()->is(Str::lower('office/about/organization').'/*') ? 'active' : ''}}" href="{{route('office.about.organization.index')}}">
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Struktur Organisasi</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/timeline/activity')) || request()->is(Str::lower('office/timeline/activity').'/*') ? 'active' : ''}}" href="{{route('office.timeline.activity.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-picture"></i>
                        </span>
                        <span class="menu-title">Kegiatan</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is(Str::lower('office/category-prodi*')) || request()->is(Str::lower('office/program-studi*')) ? 'here show' : ''}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-award"></i>
                        </span>
                        <span class="menu-title">Program Studi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{request()->is(Str::lower('office/category-prodi')) || request()->is(Str::lower('office/category-prodi').'/*') ? 'active' : ''}}" href="{{route('office.category-prodi.index')}}">
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kategori</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/program-studi')) || request()->is(Str::lower('office/program-studi').'/*') ? 'active' : ''}}" href="{{route('office.program-studi.index')}}">
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List Program Studi</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/comment')) || request()->is(Str::lower('office/comment').'/*') ? 'active' : ''}}" href="{{route('office.comment.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-message-text-2"></i>
                        </span>
                        <span class="menu-title">Komentar</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                 <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Lainnya</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{request()->is(Str::lower('office/setting/logo')) || request()->is(Str::lower('office/setting/logo').'/*') ? 'active' : ''}}" href="{{route('office.setting.logo.index')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-abstract-32"></i>
                        </span>
                        <span class="menu-title">Pengaturan</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu link-->
                @elseif (auth()->user()->role == '4')
                 <!--begin:Menu item-->
                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is('office/dosen/*') ? 'here show' : ''}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-profile-user"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/identitas')) || request()->is(Str::lower('office/dosen/identitas').'/*') ? 'active' : ''}}" href="{{route('office.dosen.identitas.index')}}">
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Identitas</span>
                            </a>
                            @if (auth()->user()->background)
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/latar-belakang')) || request()->is(Str::lower('office/dosen/latar-belakang').'/*') ? 'active' : ''}}" href="{{route('office.dosen.latar_belakang.edit')}}">
                            @else
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/latar-belakang')) || request()->is(Str::lower('office/dosen/latar-belakang').'/*') ? 'active' : ''}}" href="{{route('office.dosen.latar_belakang.index')}}">
                            @endif
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Latar Belakang</span>
                            </a>
                            {{-- <a class="menu-link {{request()->is(Str::lower('office/dosen/autobiografi')) || request()->is(Str::lower('office/dosen/autobiografi').'/*') ? 'active' : ''}}" href="{{route('office.dosen.autobiografi.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Autobiografi</span>
                            </a> --}}
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/ikhtisar')) || request()->is(Str::lower('office/dosen/ikhtisar').'/*') ? 'active' : ''}}" href="{{route('office.dosen.ikhtisar.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Ikhtisar</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/pendidikan')) || request()->is(Str::lower('office/dosen/pendidikan').'/*') ? 'active' : ''}}" href="{{route('office.dosen.pendidikan.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Riwayat Pendidikan</span>
                            </a>
                            @if (auth()->user()->contact)
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/contact')) || request()->is(Str::lower('office/dosen/contact').'/*') ? 'active' : ''}}" href="{{route('office.dosen.contact.edit')}}">
                            @else
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/contact')) || request()->is(Str::lower('office/dosen/contact').'/*') ? 'active' : ''}}" href="{{route('office.dosen.contact.index')}}">
                            @endif
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kontak</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/dosen/about')) || request()->is(Str::lower('office/dosen/about').'/*') ? 'active' : ''}}" href="{{route('office.dosen.about.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tentang</span>
                            </a>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lainnya</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{request()->is(Str::lower('office/dosen/artikel')) || request()->is(Str::lower('office/dosen/artikel').'/*') ? 'active' : ''}}" href="{{route('office.dosen.artikel.index')}}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Artikel</span>
                                    </a>
                                    <a class="menu-link {{request()->is(Str::lower('office/dosen/book')) || request()->is(Str::lower('office/dosen/book').'/*') ? 'active' : ''}}" href="{{route('office.dosen.book.index')}}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Buku</span>
                                    </a>
                                    <a class="menu-link {{request()->is(Str::lower('office/dosen/pendanaan')) || request()->is(Str::lower('office/dosen/pendanaan').'/*') ? 'active' : ''}}" href="{{route('office.dosen.pendanaan.index')}}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Pendanaan</span>
                                    </a>
                                    <a class="menu-link {{request()->is(Str::lower('office/dosen/studies')) || request()->is(Str::lower('office/dosen/studies').'/*') ? 'active' : ''}}" href="{{route('office.dosen.studies.index')}}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Gugus Bidang Kajian</span>
                                    </a>
                                    <a class="menu-link {{request()->is(Str::lower('office/dosen/publication')) || request()->is(Str::lower('office/dosen/publication').'/*') ? 'active' : ''}}" href="{{route('office.dosen.publication.index')}}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Publikasi Teratas</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.frk.index') }}" class="menu-link {{request()->is(Str::lower('office/frk')) || request()->is(Str::lower('office/frk').'/*') ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-briefcase"></i>
                        </span>
                        <span class="menu-title">Forum Rencana Kerja (FRK)</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.fed.index') }}" class="menu-link {{request()->is(Str::lower('office/fed')) || request()->is(Str::lower('office/fed').'/*') ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-chart-line-up">
                            </i>
                        </span>
                        <span class="menu-title">Forum Evaluasi Dosen (FED)</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                @elseif (auth()->user()->role == '5')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{request()->is('office/staff/*') ? 'here show' : ''}}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-profile-user"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{request()->is(Str::lower('office/staff/identitas')) || request()->is(Str::lower('office/staff/identitas').'/*') ? 'active' : ''}}" href="{{route('office.staff.identitas.index')}}">
                                {{-- <span class="menu-icon">
                                    {!!$child->icon!!}
                                </span> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Identitas</span>
                            </a>
                            @if (auth()->user()->background)
                            <a class="menu-link {{request()->is(Str::lower('office/staff/latar-belakang')) || request()->is(Str::lower('office/staff/latar-belakang').'/*') ? 'active' : ''}}" href="{{route('office.staff.latar_belakang.edit')}}">
                            @else
                            <a class="menu-link {{request()->is(Str::lower('office/staff/latar-belakang')) || request()->is(Str::lower('office/staff/latar-belakang').'/*') ? 'active' : ''}}" href="{{route('office.staff.latar_belakang.index')}}">
                            @endif
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Latar Belakang</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/staff/pendidikan')) || request()->is(Str::lower('office/staff/pendidikan').'/*') ? 'active' : ''}}" href="{{route('office.staff.pendidikan.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Riwayat Pendidikan</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/staff/staff-activity')) || request()->is(Str::lower('office/staff/staff-activity').'/*') ? 'active' : ''}}" href="{{route('office.staff.staff_activity.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kegiatan Staf Sekarang</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/staff/experience')) || request()->is(Str::lower('office/staff/experience').'/*') ? 'active' : ''}}" href="{{route('office.staff.experience.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pengalaman</span>
                            </a>
                            @if (auth()->user()->contact)
                            <a class="menu-link {{request()->is(Str::lower('office/staff/contact')) || request()->is(Str::lower('office/staff/contact').'/*') ? 'active' : ''}}" href="{{route('office.staff.contact.edit')}}">
                            @else
                            <a class="menu-link {{request()->is(Str::lower('office/staff/contact')) || request()->is(Str::lower('office/staff/contact').'/*') ? 'active' : ''}}" href="{{route('office.staff.contact.index')}}">
                            @endif
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kontak</span>
                            </a>
                            <a class="menu-link {{request()->is(Str::lower('office/staff/tentang')) || request()->is(Str::lower('office/staff/tentang').'/*') ? 'active' : ''}}" href="{{route('office.staff.tentang.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tentang</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                @elseif (auth()->user()->user_category->slug == 'himatek')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.himatek.activity.index') }}" class="menu-link {{request()->is(Str::lower('office/himatek/activity*')) ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-picture"></i>
                        </span>
                        <span class="menu-title">List Kegiatan Himatek</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @elseif (auth()->user()->user_category->slug == 'himatif')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.himatif.activity.index') }}" class="menu-link {{request()->is(Str::lower('office/himatif/activity*')) ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-picture"></i>
                        </span>
                        <span class="menu-title">List Kegiatan Himatif</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @elseif (auth()->user()->user_category->slug == 'himatera')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.himatera.activity.index') }}" class="menu-link {{request()->is(Str::lower('office/himatera/activity*')) ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-picture"></i>
                        </span>
                        <span class="menu-title">List Kegiatan Himatera</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @elseif (auth()->user()->role == '2')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.dekan.index') }}" class="menu-link {{request()->is(Str::lower('office/dekan/request-list')) || request()->is(Str::lower('office/dekan/request-list').'/*') ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-briefcase"></i>
                        </span>
                        <span class="menu-title">List Permintaan FRK dan FED</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @elseif (auth()->user()->role == '3')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.kaprodi.index') }}" class="menu-link {{request()->is(Str::lower('office/kaprodi/request-list')) || request()->is(Str::lower('office/kaprodi/request-list').'/*') ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-briefcase"></i>
                        </span>
                        <span class="menu-title">List Permintaan FRK dan FED</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @elseif (auth()->user()->role == '2')
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('office.dekan.index') }}" class="menu-link {{request()->is(Str::lower('office/dekan/request-list')) || request()->is(Str::lower('office/dekan/request-list').'/*') ? 'active' : ''}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-briefcase"></i>
                        </span>
                        <span class="menu-title">List Permintaan FRK dan FED</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                @endif
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    @if (auth()->user()->role == 4)
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="#coming-soon" class="btn btn-flex flex-center d-flex align-items-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            data-bs-original-title="Kunjungi link berikut untuk mengetahui ......">
            <span class="btn-label">Button Khusus</span>
            {{-- <i class="fa-solid fa-arrow-right ms-2 fs-5"></i> --}}
        </a>
    </div>
    @endif
    <!--end::Footer-->
</div>