{{ $course->title }}
{{ $course->tagline }}
{{ $course->description }}
<p>{{ $course->videos_count }} videos</p>
@foreach($course->learnings as $learning)
    <li>{{ $learning }}</li>
@endforeach
<img src="{{ asset("images/$course->image_name") }}" alt="Image of the course">

