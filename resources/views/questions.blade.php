<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                
                {{-- নতুন প্রশ্ন যোগ করার কম্পোনেন্ট --}}
                <div class="mb-8 p-6 border rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">নতুন প্রশ্ন যোগ করুন</h3>
                    @livewire('create-question')
                </div>

                {{-- সকল প্রশ্ন দেখানোর কম্পোনেন্ট --}}
                <div class="p-6 border rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">সকল প্রশ্নের তালিকা</h3>
                    @livewire('show-questions')
                </div>

            </div>
        </div>
    </div>
</div>
