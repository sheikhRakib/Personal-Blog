@extends('website.app')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @forelse($leftPosts as $post)
                <x-website.minicard :post="$post" />
                @empty
                <p>No Data</p>
                @endforelse
            </div>

            <div class="col-md-4">
                @forelse($centerPost as $post)
                <x-website.featuredcard :post="$post" />
                @empty
                <p>No Data</p>
                @endforelse
            </div>

            <div class="col-md-4">
                @forelse($rightPosts as $post)
                <x-website.minicard :post="$post" />
                @empty
                <p>No Data</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12"><h2>Recent Posts</h2></div>
        </div>
        <div class="row">
            @forelse($recentPosts as $post)
            <x-website.recentPostCard :post="$post"/>
            @empty
            <p>No Data</p>
            @endforelse
        </div>

        {{ $recentPosts->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout">
            @forelse($lastFooterPost as $post)
            <x-website.VerticalPostCard :post="$post"/>
            @empty
            @endforelse

            <div class="col-md-7">
                @forelse($firstFooterPost as $post)
                <x-website.HorizontalPostCard :post="$post"/>
                @empty
                @endforelse

                <div class="two-col d-block d-md-flex justify-content-between">
                    @forelse($firstfooterPosts2 as $post)
                    <x-website.footerPostCard :post="$post"/>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<x-website.subscribeButton />

@endsection
