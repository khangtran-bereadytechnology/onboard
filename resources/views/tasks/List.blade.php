<div class="space-y-2 h-[450px] overflow-y-auto bg-white p-3 rounded-md">
    <h2 class="font-semibold">{{ 'Task List: ' . count($tasks) }}</h2>
    @foreach ($tasks as $task)
        <div class="flex justify-between items-center px-4 py-3 bg-gray-100 rounded-md">
            {{-- form edit --}}
            <div class="flex-1" x-data="{ editMode: false }">
                <form action="{{ route('tasks.update', $task) }}" method="POST" class="flex items-center gap-2 w-full">
                    @csrf
                    @method('PUT')
                    <input name="is_completed" :disabled="!editMode" type="checkbox"
                        class="h-4 w-4 mr-2 hover:cursor-pointer" @checked($task->is_completed) />
                    <input name="title" :disabled="!editMode" value="{{ $task->title }}" class="flex-1" />
                    <div class="flex gap-2">
                        <!-- Nút Edit -->
                        <button type="button" x-show="!editMode" @click="editMode = true"
                            class="text-base text-yellow-500 hover:cursor-pointer hover:text-yellow-700">
                            Edit
                        </button>

                        <!-- Nút Save -->
                        <button type="submit" x-show="editMode"
                            class="text-base text-green-500 hover:cursor-pointer hover:text-green-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>

            {{-- Form xóa --}}
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="ml-4">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="text-base text-red-500 hover:cursor-pointer hover:text-red-700">Remove</button>
            </form>
        </div>
    @endforeach

</div>
