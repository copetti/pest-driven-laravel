<div>
    <h3>
        {{ $video->title }}
        {{ $video->description }}
        {{ $video->duration }}min

        <iframe src="https://player.vimeo.com/video/{{ $video->vimeo_id }}" width="640" height="360" allow="autoplay; fullscreen" allowfullscreen></iframe>
    </h3>
</div>
