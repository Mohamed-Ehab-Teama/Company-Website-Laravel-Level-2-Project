@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-warning list-group list-group-flush']) }}>
        @foreach ((array) $messages as $message)
            <li class="list-group-item mb-2 mt-0">{{ $message }}</li>
        @endforeach
    </ul>
@endif
