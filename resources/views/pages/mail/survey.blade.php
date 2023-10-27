

@foreach($alldata as $key => $value)

    @if (strpos($key, 'q_') === 0)
    @php
        $questionNumber = str_replace('q_', '', $key);
    @endphp

        <p>Question: {{ $alldata[$questionNumber - 1]['question'] }}</p>
        <p>Answer: {{ $value }}</p>
       
    @else

        @if(in_array($key, ['name', 'address', 'email']))
            <p>{{ $key }}: {{ $value }}</p>
        @endif
    @endif
@endforeach









