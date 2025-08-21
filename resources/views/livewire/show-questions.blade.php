<div style="margin-top: 30px;">
    <h2>সকল প্রশ্নের তালিকা</h2>
    <hr>
    @forelse ($questions as $question)
        <div style="margin-bottom: 20px;">
            <h4>{{ $loop->iteration }}. {{ $question->title }}</h4>
            <ul>
                <li>A. {{ $question->options['a'] }}</li>
                <li>B. {{ $question->options['b'] }}</li>
                <li>C. {{ $question->options['c'] }}</li>
                <li>D. {{ $question->options['d'] }}</li>
            </ul>
            <p><strong>সঠিক উত্তর: {{ strtoupper($question->correct_answer) }}</strong></p>
        </div>
    @empty
        <p>এখনও কোনো প্রশ্ন যোগ করা হয়নি।</p>
    @endforelse
</div>