<div class="col-lg-4 mb-4">
    <div class="entry2">
        <a href="{{ route('website.post', $post->slug) }}"><img src="{{ asset("website/images/{$post['image']}") }}"
                alt="Image" class="img-fluid rounded"></a>
        <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{ $post->category->name }}</span>

            <h2><a href="{{ route('website.post', $post->slug) }}">{{ $post->title }}</a></h2>
            <p> {{ Str::limit($post->description, 100) }} </p>
            <p><a href="{{ route('website.post', $post->slug) }}">Read More</a></p>
        </div>
    </div>
</div>
