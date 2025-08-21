<div>
    <div>
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Welcome, {{ auth()->user()->name }}!</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-gray-500">Total Students</h4>
                <p class="text-3xl font-bold">1,250</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-gray-500">Total Questions</h4>
                <p class="text-3xl font-bold">50,000</p>
            </div>
        </div>
    </div>
</div>
