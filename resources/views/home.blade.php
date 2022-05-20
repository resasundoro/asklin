@section('title')
    Akreditasi Klinik Indonesia
@endsection

@extends('layouts.frontend.main')

@section('content')
<div class="container py-4 my-5">
    <div class="row justify-content-center text-center mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
        <div class="col-lg-8">
            <h2 class="font-weight-bold mb-3 mt-3">Selayang Pandang</h2>
            <p class="text-6 text-color-dark line-height-7 negative-ls-1 px-5">Akreditasi klinik adalah proses penilaian eksternal oleh lembaga yang ditunjuk Kemkes.Selain menilai mutu dan sistem penilaian klinik akreditasi juga bertujuan membina klinik untuk meningkatkan sistem pelayanan klinik dan kinerja yang berfokus pada kebutuhan masyarakat, keselamatan pasien dan manajemen resiko.
                </p>
            <!-- <p class="opacity-9 text-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamos bibendum magna ex.</p> -->
        </div>
    </div>
    <div class="row featured-boxes featured-boxes-style-4">
        <div class="col-md-6 col-lg-4">
            <div class="featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                <div class="box-content px-4">
                    <i class="icon-featured icon-badge icons text-12"></i>
                    <h4 class="font-weight-bold text-color-dark pb-1 mb-2">Credible</h4>
                    <p class="mb-0">ASKI telah di percaya sebagai Lembaga Akreditasi Klinik Pertama di Indonesia,ASKI
                        juga di gawangi oleh tim yang berpengalaman dibidangnya</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeIn">
                <div class="box-content px-4">
                    <i class="icon-featured icon-globe icons text-12"></i>
                    <h4 class="font-weight-bold text-color-dark pb-1 mb-2">Reliable</h4>
                    <p class="mb-0">Dengan teknologi informasi yang modern,Akreditasi akan lebih cepat, aman dan transparan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="featured-box featured-box-primary featured-box-effect-4 appear-animation" data-appear-animation="fadeIn">
                <div class="box-content px-4">
                    <i class="icon-featured icon-organization icons text-12"></i>
                    <h4 class="font-weight-bold text-color-dark pb-1 mb-2">Relationship</h4>
                    <p class="mb-0">ASKI mendukung dan membantu
                        para klinik di Indonesia untuk tumbuh
                    berkembang seiring dengan berjalannya waktu</p>
                </div>
            </div>
        </div>
        
    </div>
</div>

<section class="parallax section section-height-3 section-parallax m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('frontend/img/parallax/parallax-pertama.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                <p class="text-color-primary text-2 line-height-1 mb-2">Breaking News</p>
                <h4 class="text-color-dark font-weight-normal line-height-3 text-6">LEMBAGA AKREDITASI KLINIK INDONESIA<strong class="font-weight-extra-bold"> (ASKI)</strong></h4>
                <p class="lead pb-2 mb-4">Dalam rangka meningkatkan pelayanan sarana kesehatan dasar bagi pelayanan Klinik kepada masyarakat, hal ini dilakukan berbagai upaya sebagai peningkatan mutu dan juga kinerja diantaranya dengan pembakuan dan pengembangan sebuah sistem manajemen mutu dan upaya memperbaiki kinerja yang berkesinambungan baik pelayanan klinis, manajerial dan program.</p>
                <a href="#" class="btn btn-outline btn-primary font-weight-bold text-1 px-4 btn-py-2">DAFTAR SEKARANG JUGA </a>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                        <div class="row counters counters-lg counters-text-dark">
                            <div class="col-md-6 mb-5">
                                <div class="counter">
                                    <strong class="font-weight-extra-bold text-12" data-to="200" data-append="+">0</strong>
                                    <label class="opacity-8 font-weight-normal text-4">Permintaan Assesor</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="counter">
                                    <strong class="font-weight-extra-bold text-12" data-to="300" data-append="+">0</strong>
                                    <label class="opacity-8 font-weight-normal text-4">Assesmen Kecakupan</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5 mb-md-0">
                                <div class="counter">
                                    <strong class="font-weight-extra-bold text-12" data-to="20" data-append="+">0</strong>
                                    <label class="opacity-8 font-weight-normal text-4">Assesmen Lapangan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="counter">
                                    <strong class="font-weight-extra-bold text-12" data-to="100" data-append="+">0</strong>
                                    <label class="opacity-8 font-weight-normal text-4">Validasi Selesai</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5 my-4">
    <div class="row justify-content-center pt-3">
        <div class="col-lg-10 text-center">
            <h2 class="custom-highlight-text-1 d-inline-block line-height-5 text-4 positive-ls-3 font-weight-medium text-color-primary mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">News</h2>
            <h3 class="text-9 line-height-3 text-transform-none font-weight-semibold mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Berita dan Informasi</h3>
            <p class="text-3-5 pb-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendreriast ehicula leo, vel efficitur felis ultrices non. Cras a elit sit amet leo acun volutpat. Suspendisse hendrerit vehicula leo, vel efficitur fel. </p>
        </div>
    </div>
    <div class="row row-gutter-sm justify-content-center mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
        <div class="col-sm-9 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="demo-business-consulting-3-blog-post.html" class="custom-link-hover-effects text-decoration-none" data-cursor-effect-hover="plus">
                <div class="card border-0 box-shadow-4">
                    <div class="card-img-top position-relative overlay">
                        <div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
                            <span class="custom-date-style-1 text-center bg-primary text-color-light font-weight-semibold text-5-5 line-height-2 px-3 py-2">
                                <span class="position-relative z-index-2">
                                    18
                                    <span class="d-block custom-font-size-1 positive-ls-2 px-1">FEB</span>
                                </span>
                            </span>
                        </div>
                        <img src="{{ asset('frontend/img/demos/business-consulting-3/blog/blog-1.jpg') }}" class="img-fluid" alt="Lorem Ipsum Dolor" />
                    </div>
                    <div class="card-body p-4">
                        <span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">FINANCE</span>
                        <h4 class="font-weight-semibold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
                        <span class="custom-view-more d-inline-flex font-weight-medium text-color-primary">
                            View More
                            <img width="27" height="27" src="{{ asset('frontend/img/demos/business-consulting-3/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary ms-2'}" style="width: 27px;" />
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-9 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="demo-business-consulting-3-blog-post.html" class="custom-link-hover-effects text-decoration-none" data-cursor-effect-hover="plus">
                <div class="card border-0 box-shadow-4">
                    <div class="card-img-top position-relative overlay">
                        <div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
                            <span class="custom-date-style-1 text-center bg-primary text-color-light font-weight-semibold text-5-5 line-height-2 px-3 py-2">
                                <span class="position-relative z-index-2">
                                    15
                                    <span class="d-block custom-font-size-1 positive-ls-2 px-1">FEB</span>
                                </span>
                            </span>
                        </div>
                        <img src="{{ asset('frontend/img/demos/business-consulting-3/blog/blog-2.jpg') }}" class="img-fluid" alt="Lorem Ipsum Dolor" />
                    </div>
                    <div class="card-body p-4">
                        <span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">FINANCE</span>
                        <h4 class="font-weight-semibold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
                        <span class="custom-view-more d-inline-flex font-weight-medium text-color-primary">
                            View More
                            <img width="27" height="27" src="{{ asset('frontend/img/demos/business-consulting-3/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary ms-2'}" style="width: 27px;" />
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-9 col-md-6 col-lg-4">
            <a href="demo-business-consulting-3-blog-post.html" class="custom-link-hover-effects text-decoration-none" data-cursor-effect-hover="plus">
                <div class="card border-0 box-shadow-4">
                    <div class="card-img-top position-relative overlay">
                        <div class="position-absolute bottom-10 right-0 d-flex justify-content-end w-100 py-3 px-4 z-index-3">
                            <span class="custom-date-style-1 text-center bg-primary text-color-light font-weight-semibold text-5-5 line-height-2 px-3 py-2">
                                <span class="position-relative z-index-2">
                                    12
                                    <span class="d-block custom-font-size-1 positive-ls-2 px-1">FEB</span>
                                </span>
                            </span>
                        </div>
                        <img src="{{ asset('frontend/img/demos/business-consulting-3/blog/blog-3.jpg') }}" class="img-fluid" alt="Lorem Ipsum Dolor" />
                    </div>
                    <div class="card-body p-4">
                        <span class="d-block text-color-grey font-weight-semibold positive-ls-2 text-2">FINANCE</span>
                        <h4 class="font-weight-semibold text-5 text-color-hover-primary mb-2">Lorem ipsum dolor sit a met, consectetur</h4>
                        <span class="custom-view-more d-inline-flex font-weight-medium text-color-primary">
                            View More
                            <img width="27" height="27" src="{{ asset('frontend/img/demos/business-consulting-3/icons/arrow-right.svg') }}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary ms-2'}" style="width: 27px;" />
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div id="team" class="container pb-4">
    <div class="row pt-5 mt-5 mb-4">
        <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter">
            <h2 class="font-weight-bold mb-1">Surveryor Team</h2>
            <p>Surveyor ASKI</p>
        </div>
    </div>
    <div class="row pb-5 mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <span class="thumb-info thumb-info-hide-wrapper-bg thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <a href="about-me.html">
                        <img src="{{ asset('frontend/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                    </a>
                </span>
                <span class="thumb-info-caption">
                    <h3 class="font-weight-extra-bold text-color-dark text-4 line-height-1 mt-3 mb-0">dr. Kurnia Putra</h3>
                    <span class="text-2 mb-0">Bidang Admen DKI Jakarta</span>
                    <span class="thumb-info-caption-text pt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
                    
                </span>
            </span>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <span class="thumb-info thumb-info-hide-wrapper-bg thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <a href="about-me.html">
                        <img src="{{ asset('frontend/img/team/team-2.jpg') }}" class="img-fluid" alt="">
                    </a>
                </span>
                <span class="thumb-info-caption">
                    <h3 class="font-weight-extra-bold text-color-dark text-4 line-height-1 mt-3 mb-0">dr. Herindiati, MKK</h3>
                    <span class="text-2 mb-0">UKP Jawa Barat</span>
                    <span class="thumb-info-caption-text pt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
                    
                </span>
            </span>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-sm-0">
            <span class="thumb-info thumb-info-hide-wrapper-bg thumb-info-no-zoom">
                <span class="thumb-info-wrapper">
                    <a href="about-me.html">
                        <img src="{{ asset('frontend/img/team/team-3.jpg') }}" class="img-fluid" alt="">
                    </a>
                </span>
                <span class="thumb-info-caption">
                    <h3 class="font-weight-extra-bold text-color-dark text-4 line-height-1 mt-3 mb-0">dr. H. Marwan Nusri, MPH</h3>
                    <span class="text-2 mb-0">Admen DKI Jakarta</span>
                    <span class="thumb-info-caption-text pt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
                    
                </span>
            </span>
        </div>
        
    </div>
</div>
@endsection
