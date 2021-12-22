<div class="entry">

    <div class="entry-background">
        <a href="/posts/{{ $post->id }}" class="entry-link">
            <div class="entry-content">
                <div class="entry-title">{{ $post->title }}</div>
                <div class="entry-summary">Summary</div>
                <div class="entry-summary-text">{{ $post->body }}</div>
                <div class="entry-bottom">
                    @yield('bottom')
                </div>
            </div>
        </a>
    </div>

</div>
<div class="line-container">
    <div class="line-small"></div>
</div>
