<form action="{{ route('tasks.index') }}" method="get" class="bg-white p-3 rounded-md flex flex-row gap-2">
    @csrf
    <input name="searchTerm" value="{{ request('searchTerm') }}" type="text" placeholder="Type to search"
        class="text-base h-8 bg-gray-50 px-2 rounded-sm focus:outline-gray-500 flex-1">

    <div>
        <span>Status:</span>
        <select name="status" class="border border-gray-400 px-1">
            <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>All</option>
            <option value="done" {{ request('status') === 'done' ? 'selected' : '' }}>Done</option>
            <option value="notDone" {{ request('status') === 'notDone' ? 'selected' : '' }}>Not done</option>
        </select>
    </div>

    <button type="submit" class="bg-teal-500 hover:bg-teal-700 px-2 rounded-md">Search</button>
</form>
