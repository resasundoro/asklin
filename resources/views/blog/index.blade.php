@section('title')
    Blog
@endsection

@extends('layouts.frontend.main')

@section('content')
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="text-dark font-weight-bold text-8">Blog</h1>
                <span class="sub-title text-dark">Check out our Latest News!</span>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-4">
    <div class="row">
        <div class="col">
            <div class="blog-posts">
                <div class="row">
                    @foreach($artikel as $post)
                        <div class="col-md-4">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        <img src="{{ asset('images/blog/'.$post->cover) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{ $post->title }}" />
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                    <p>{{ $post->title }}</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By {{ $post->nm_user }} </span>
                                        <span>
                                            <i class="far fa-folder"></i>
                                            <a href="{{ route('kategori.blog', $post->ka_slug) }}">{{ $post->nm_kategori }}</a>
                                        </span>
                                        <span><i class="far fa-clock"></i> {{ (date('d/m/Y H:i', strtotime($post->created_at))) }}</span>
                                        <span class="d-block mt-2"><a href="{{ route('blog.show', $post->slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Selengkapnya</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>
                    @endforeach
                    {!! $artikel->render() !!}
                </div>

                <div class="row">
                    <div class="col">
                        <ul class="pagination float-end">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection