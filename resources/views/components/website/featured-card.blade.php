<a href="{{ route('website.post', $post->slug) }}" class="h-entry img-5 h-100 gradient"
    style="background-image: url('{{ asset("website/images/{$post['image']}") }}'">
    <div class="text">
        <div class="post-categories mb-3">
            <span class="post-category bg-danger">{{ $post->category->name }}</span>
        </div>
        <h2>{{ $post->title }}</h2>
        <span class="date">{{ $post->created_at->format('M d, Y')}}</span>
    </div>
</a>
