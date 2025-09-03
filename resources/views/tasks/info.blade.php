<div class=" bg-white p-3 rounded-md">
    <!-- Header -->
    <div class="flex flex-row w-full justify-between">
        <!-- Thông tin -->
        <div class="flex gap-2">
            <span>
                <span>To Dos: </span>
                <span>{{ $totalTasks }}</span>
            </span>|
            <span>
                <span>Completed: </span>
                <span>{{ $totalTaskCompleted }}</span>
            </span>
        </div>


        <div>
        </div>
    </div>
    <!-- Thông báo -->
    @if ($totalTasks === $totalTaskCompleted && $totalTasks !== 0)
        <p class="h-10 mt-2 px-2 py-1 bg-green-100 text-green-700 rounded-md">Congrats you finished your
            list!
        </p>
    @endif

</div>
