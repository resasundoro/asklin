@section('title')
    Event
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="parallax section section-text-light section-parallax bg-primary m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('frontend/img/parallax/parallax-kedua.jpg') }}">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col">
                    
                    <h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">EVENT ASKI</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="border-top border-color-light-5 text-light pt-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">

                        <div class="row align-items-center">
                            <div class="col-12 mb-3 mb-lg-0 col-lg">
                            <select class="form-select form-control h-auto" data-msg-required="Pilih Event" name="city" required>
                                <option value="">Pilih Event</option>
                                <option value="1">Seminar</option>
                                <option value="2">Simposium</option>
                                <option value="3">Workshop</option>
                            </select>
                            </div>
                            <div class="col-12 mb-3 mb-lg-0 col-lg">
                                <input type="text" value="" data-msg-required="keywords" maxlength="100" class="form-control text-3 h-auto py-2" name="subject" placeholder="Keywords" required>
                            </div>
                            <div class="col-12 mb-3 mb-lg-0 col-lg">
                                <input type="date" value="" data-msg-required="Tanggal Mulai" maxlength="100" class="form-control text-3 h-auto py-2" name="subject" placeholder="Tanggal Mulai" required>
                            </div>
                            <div class="col-12 mb-3 mb-lg-0 col-lg">
                                <input type="date" value="" data-msg-required="Tanggal Akhir" maxlength="100" class="form-control text-3 h-auto py-2" name="subject" placeholder="Tanggal Akhir" required>
                            </div>
                            <div class="col-12 mb-3 mb-lg-0 col-lg">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-modern btn-dark btn-arrow-effect-1 text-capitalize text-2-5 px-5 py-3 anim-hover-translate-top-5px transition-2ms">Submit <i class="fas fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>
</div>

    <div class="container">

    <div class="row mt-5">
        <div class="col">
            <div class="row">
                <!-- ================================= -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="recent-posts">
                        <article class="post">
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <div class="post-date">
                                        <span class="day text-color-dark font-weight-extra-bold">11</span>
                                        <span class="month">MEI</span>
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <h4 class="line-height-3"><a href="blog-post.html" class="text-decoration-none">Workshop Persiapan AKreditasi Klinik Pratama </a></h4>
                                    <p class="mb-1">ASKLIN Kabupaten Bekasi Mengadakan Workshop Persiapan Akreditasi Klinik Pratama Pada Tanggal 11 s/d 13 Mei 2022 yang dihadiri oleh Ketua Asklin Kab.Bekasi dr. Mulyana Syarif Panija</p>
                                    <a href="blog-post.html" class="btn btn-light text-uppercase text-primary text-1 py-2 px-3 mb-1 mt-2"><strong>READ MORE</strong><i class="fas fa-chevron-right text-2 ps-2"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- ================================= -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="recent-posts">
                        <article class="post">
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <div class="post-date">
                                        <span class="day text-color-dark font-weight-extra-bold">20</span>
                                        <span class="month">MEI</span>
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <h4 class="line-height-3"><a href="blog-post.html" class="text-decoration-none">Workshop Pemahaman Standar PMKP, PPI, MFK, K3</a></h4>
                                    <p class="mb-1">>ASKLIN Komisariat Gorontalo Mengadakan Workshop Pemahaman Standar PMKP, PPI, MFK, K3 Pada Tanggal 20  Mei 2022 di hotel Dumhil Kota Gorontalo</p>
                                    <a href="blog-post.html" class="btn btn-light text-uppercase text-primary text-1 py-2 px-3 mb-1 mt-2"><strong>READ MORE</strong><i class="fas fa-chevron-right text-2 ps-2"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- ================================= -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="recent-posts">
                        <article class="post">
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <div class="post-date">
                                        <span class="day text-color-dark font-weight-extra-bold">21</span>
                                        <span class="month">MEI</span>
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <h4 class="line-height-3"><a href="blog-post.html" class="text-decoration-none">Workshop Pemahaman Standar Akreditasi Klinik</a></h4>
                                    <p class="mb-1">>ASKLIN Komisariat Aceh Daerah Timur Mengadakan WWorkshop Pemahaman Standar Akreditasi Klinik Pada Tanggal 21  Mei 2022 Secara Daring Virtual Conference Zoom</p>
                                    <a href="blog-post.html" class="btn btn-light text-uppercase text-primary text-1 py-2 px-3 mb-1 mt-2"><strong>READ MORE</strong><i class="fas fa-chevron-right text-2 ps-2"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- ================================= -->
            </div>
        </div>
    </div>
</div>
@endsection