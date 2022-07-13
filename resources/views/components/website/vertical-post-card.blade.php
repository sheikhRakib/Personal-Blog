<div class="col-md-5 order-md-2">
    <a href="{{ route('website.post', $post->slug) }}" class="hentry img-1 h-100 gradient"
        style="background-image: url('{{ asset("website/images/{$post['image']}") }}');">
        <span class="post-category text-white bg-danger">{{ $post->category->name }}</span>
        <div class="text">
            <h2>{{ $post->title }}</h2>
            <span class="date">{{ $post->created_at->format('M d, Y')}}</span>
        </div>
    </a>
</div>
