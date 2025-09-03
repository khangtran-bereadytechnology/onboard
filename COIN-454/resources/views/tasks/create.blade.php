<!-- Tạo task mới -->
<div class="max-w-2xl w-full fixed bottom-5 left-1/2 -translate-x-1/2 p-3">
    <form action="{{ route('tasks.store') }}" method="POST"
        class="flex items-center shadow-xl bg-white rounded-md border-gray-100 border-2">
        @csrf

        <input name="title" type="text" placeholder="Add to do item"
            class="flex-1 p-4 focus:outline-none shadow-md rounded-lg" />
        <button type="submit"
            class="w-14 h-full text-4xl font-bold cursor-pointer hover:scale-105 hover:shadow-xl hover:bg-blue-200">
            +
        </button>
    </form>
</div>
