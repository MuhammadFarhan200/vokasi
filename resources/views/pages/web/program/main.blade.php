<x-web-layout title="program {{ $category->name ?? '-' }}">
    <!-- Page Title
  ============================================= -->
    <section class="page-title page-title-parallax parallax dark">
        <div class="container">
            <div class="page-title-row">

                <div class="page-title-content">
                    <h2>Program Studi {{ $category->name ?? '-' }}</h2>
                    <span>
                        {!! $program->definisi ?? '-' !!}
                    </span>
                </div>
            </div>
        </div>
    </section><!-- .page-title end -->
    <!-- Content
  ============================================= -->
    <section id="content" class="pb-5">
        <style>
            ol:not(header ol):not(footer ol) {
               display: block;
               list-style-type: decimal;
               margin-top: .5em;
               margin-bottom: 1em;
               margin-left: 0;
               margin-right: 0;
               padding-left: 30px;
           }

           ul:not(header ul):not(footer ul) {
               display: block;
               list-style-type: disc;
               margin-top: .5em;
               margin-bottom: 1em;
               margin-left: 0;
               margin-right: 0;
               padding-left: 30px;
           }

           li:not(header li):not(footer li) {
               display: list-item;
           }
       </style>
        <div class="container">
            <div id="section-features" class="page-section pb-5" style="margin-top: -35px">
                <div style="margin-top: -20px; border-top:3px; padding-top: 30px">
                    <h3 style="color: #003966"><b>SEJARAH</b></h3>
                </div>
                <hr class="col-4" style="margin-top: -20px; padding: 1px; border-top: 5px solid; color:#EE771D">
                <div>
                    {!! $program->sejarah ?? '-' !!}
                </div>
            </div>
        </div>
        <div style="background: #003966">
            <div class="container">
                <div id="section-features" class="page-section pb-5">
                    <div style="border-top:3px; padding-top: 30px">
                        <h3 style="color: white"><b>Visi dan Misi D3 - Teknologi Informasi</b></h3>
                    </div>
                    <hr class="col-4" style="margin-top: -20px; padding: 1px; border-top: 5px solid; color:#EE771D">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-6 col-md-6" id="color-white-important">
                            <h4 style="color: white"><b> Visi </b></h4>
                            <div style="margin-top: -20px; color: white !important;">
                                {!! $program->visi ?? '-' !!}
                            </div>
                        </div>
                        <div class="col-6 col-md-6" id="color-white-important">
                            <h4 style="color: white"><b> Misi </b></h4>
                            <div style="margin-top: -20px; color: white !important;">
                                {!! $program->misi ?? '-' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="section-features" class="page-section">
                <div style="border-top:3px; padding-top: 30px">
                    <h3 style="color: #003966"><b>Tujuan Profil Lulusan</b></h3>
                </div>
                <hr class="col-4" style="margin-top: -20px; padding: 1px; border-top: 5px solid; color:#EE771D">
                <div class="col-md-6" id="color-black-important">
                    {!! $program->tujuan ?? '-' !!}
                </div>
                @if ($program)
                    @if ($program->link != null)
                    <div class="mt-4">
                        <span>Kunjungi link berikut untuk informasi lebih lanjut: </span>
                        <a href="{{ $program->link }}" style="color: #0081e3" target="_blank">{{ $program->link }}</a>
                    </div>
                    @endif
                @endif
            </div>

        </div>
    </section><!-- #content end -->
</x-web-layout>

