<!-- event-item.blade.php -->
<div class="container" data-event-date="{{ date('Y-m-d', strtotime($event->eve_date)) }}">
    <!-- Render the HTML structure for each filtered event -->
    <div class="rectangle">
        <div class="image-placeholder">
            @if($event->eve_img)
                <img src="{{ url('/storage/' . $event->eve_img) }}" alt="Event Image">
            @endif
        </div>

        <div class="date-placeholder">
            <p>{{ date('d F Y', strtotime($event->eve_date)) }}</p>
        </div>

        <div class="event-title">
            <a href="{{ route('event.child', $event->eve_id) }}">{{ $event->eve_name }}</a>
        </div>

        <div class="event-desc">
            <p>{{ $event->eve_sdesc }}</p>
        </div>
    </div>
</div>
