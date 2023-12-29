@foreach($events as $event)
    @include('event.event-item', ['event' => $event])
@endforeach
