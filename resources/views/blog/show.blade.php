@section('title')
    {{ $artikel->title }}
@endsection

@extends('layouts.frontend.main')

@section('content')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="text-dark font-weight-bold text-8">{{ $artikel->title }}</h1>
                <span class="sub-title text-dark">{{ $artikel->meta_desc }}</span>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active"><a href="{{ route('blog') }}">Blog</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-4">
    <div class="row">
        <div class="col">
            <div class="blog-posts single-post">
                <article class="post post-large blog-single-post border-0 m-0 p-0">
                    <div class="post-date ms-0">
                        <span class="day">{{ (date('d', strtotime($artikel->created_at))) }}</span>
                        <span class="month">{{ (date('M', strtotime($artikel->created_at))) }}</span>
                    </div>
                    <div class="post-content ms-0">
                        <h2 class="font-weight-semi-bold"><a href="{{ route('blog.show', $artikel->slug) }}">{{ $artikel->title }}</a></h2>
                        <div class="post-meta">
                            <span><i class="far fa-user"></i> By {{ $user->name }} </span>
                            <span><i class="far fa-folder"></i> <a href="{{ route('kategori.blog', $kategori->slug) }}">{{ $kategori->name }}</a></span>
                            <span>
                                <i class="far fa-file"></i> 
                                @foreach($tags as $tag)
                                    <a href="{{ route('tags.blog', $tag->slug) }}">{{ $tag->name }}</a>
                                @endforeach
                            </span>
                        </div>
                        <img src="{{ asset('images/blog/'.$artikel->cover) }}" class="img-fluid float-start me-4 mt-2" alt="{{ $artikel->title }}" />

                        {!! $artikel->desc !!}

                        <div class="post-block mt-5 post-share">
                            <h4 class="mb-3">Share this Post</h4>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60ba220dbab331b0"></script>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection