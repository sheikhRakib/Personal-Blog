<a href="{{ route('website.post', $post->slug) }}"
    class="hentry img-2 v-height mb30 gradient"
    style="background-image: url('{{ asset("website/images/{$post['image']}") }}');">
    <span class="post-category text-white bg-success">{{ $post->category->name }}</span>
    <div class="text text-sm">
        <h2>{{ $post->title }}</h2>
        <span class="date">{{ $post->created_at->format('M d, Y')}}</span>
    </div>
</a>
