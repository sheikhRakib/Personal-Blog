<a href="{{ route('website.post', $post->slug) }}" class="h-entry mb-30 v-height gradient"
    style="background-image: url('{{ asset("website/images/{$post['image']}") }}');">

    <div class="text">
        <h2>{{ $post->title }}</h2>
        <span class="date">{{ $post->created_at->format('M d, Y')}}</span>
    </div>
</a>
