<footer id="footer" style="background-color :#00337C">
    <div class="container">
        <!-- Footer Widgets ============================================= -->
        <div class="footer-widgets-wrap">
            <div class="row col-mb-50">
                <div class="col-lg-8">
                    <div class="row col-mb-50">
                        <div class="col-md-4">
                            <div class="widget widget_links">
                                <h4 class="text-white">Tentang</h4>
                                <ul class="text-white">
                                    <li><a class="text-white" href="{{ route('web.tentang') }}#sejarah">Sejarah</a></li>
                                    <li><a class="text-white" href="{{ route('web.tentang') }}#visi-misi">Visi dan Misi</a></li>
                                    <li><a class="text-white" href="{{ route('web.tentang') }}#struktur">Struktur Organisasi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget widget_links">
                                <h4 class="text-white">Program Studi</h4>
                                <ul class="text-white">
                                    @foreach (\App\Models\CategoryProdi::all() as $category)
                                    <li><a class="text-white" href="{{ route('web.program', $category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="widget widget_links">
                                <h4 class="text-white">Aktivitas Mahasiswa</h4>
                                <ul class="text-white">
                                    <li><a class="text-white" href="{{ route('web.activity', 'himatek') }}">HIMATEK</a></li>
                                    <li><a class="text-white" href="{{ route('web.activity', 'himatif') }}">HIMATIF</a></li>
                                    <li><a class="text-white" href="{{ route('web.activity', 'himatera') }}">HIMATERA</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row col-mb-50">
                        <div class="col-md-5 col-lg-12">
                            <div class="widget subscribe-widget">
                                <h4 class="text-white">Kritik dan Saran</h4>
                                <h5 class="text-white">Memiliki kritik dan saran mengenai Fakultas Vokasi Institut Teknologi Del, kirimkan komentar mu dibawah ini !</h5>
                                <div class="widget-subscribe-form-result"></div>
                                <form id="comment-form" method="POST" class="mb-0">
                                    <div class="input-group mx-auto">
                                        <div class="input-group-text"><i class="bi-envelope-plus"></i></div>
                                        <input type="text" id="comment" name="body" class="form-control" placeholder="Masukkan komentar Anda" required>
                                        {{-- <button id="submit-comment" class="btn btn-light" type="submit" onclick="handle_upload('#submit-comment', 'comment-form', 'POST')">Kirim</button> --}}
                                        <button id="submit-comment" class="btn btn-light" type="button">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .footer-widgets-wrap end -->
    </div>
    <!-- Copyrights ============================================= -->
    <div id="copyrights" style="background-color :#00337C">
        <div class="container">
            <div class="row col-mb-30">
                <div class="col-md-6 text-center text-md-start text-white">
                    Copyrights &copy; 2023 All Rights Reserved
                    {{-- <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div> --}}
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end mb-2">
                        <a href="#" class="social-icon border-transparent si-small h-bg-facebook text-white">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon border-transparent si-small h-bg-instagram text-white">
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon border-transparent si-small h-bg-youtube text-white">
                            <i class="fa-brands fa-youtube"></i>
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="#" class="social-icon border-transparent si-small me-0 h-bg-linkedin text-white">
                            <i class="fa-brands fa-linkedin"></i>
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                    {{-- <i class="bi-envelope"></i> info@canvas.com <span class="middot">&middot;</span> <i class="fa-solid fa-phone"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i class="bi-skype"></i> CanvasOnSkype --}}
                </div>
            </div>
        </div>
    </div>
    <!-- #copyrights end -->
</footer>
