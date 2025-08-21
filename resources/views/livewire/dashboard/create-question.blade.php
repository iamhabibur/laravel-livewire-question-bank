<div>
    <form wire:submit.prevent="saveQuestion">
        @if (session('success'))
            <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
        @endif

        <div>
            <label for="title">আপনার প্রশ্ন লিখুন</label><br>
            <textarea id="title" wire:model="title" rows="3" style="width: 100%;"></textarea>
            @error('title') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>
        
        <div>
            <label>অপশনগুলো</label><br>
            <input type="text" wire:model="optionA" placeholder="অপশন A" style="width: 100%; margin-bottom: 5px;">
            @error('optionA') <span style="color: red;">{{ $message }}</span> @enderror
            <input type="text" wire:model="optionB" placeholder="অপশন B" style="width: 100%; margin-bottom: 5px;">
            @error('optionB') <span style="color: red;">{{ $message }}</span> @enderror
            <input type="text" wire:model="optionC" placeholder="অপশন C" style="width: 100%; margin-bottom: 5px;">
            @error('optionC') <span style="color: red;">{{ $message }}</span> @enderror
            <input type="text" wire:model="optionD" placeholder="অপশন D" style="width: 100%; margin-bottom: 5px;">
            @error('optionD') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <div>
            <label for="correct_answer">সঠিক উত্তর কোনটি?</label><br>
            <select id="correct_answer" wire:model="correct_answer" style="width: 100%;">
                <option value="">নির্বাচন করুন</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
            </select>
            @error('correct_answer') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <button type="submit">প্রশ্ন সেভ করুন</button>
    </form>
</div>