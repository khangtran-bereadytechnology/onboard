 {{-- toast hiển thị thông báo --}}
 @if (session('success'))
     <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
         class="cursor-pointer fixed top-3 left-1/2 -translate-x-1/2 px-4 py-2 rounded-md {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}">
         {{ session('success') }}
     </div>
 @endif

 @if (session('error'))
     <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
         class="cursor-pointer fixed top-3 left-1/2 -translate-x-1/2 px-4 py-2 rounded-md {{ session('error') ? 'bg-green-500' : 'bg-red-500' }}">
         {{ session('error') }}
     </div>
 @endif

 {{-- toast hiển thị thông báo lỗi từ validator --}}
 @if ($errors->any())
     <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
         class="cursor-pointer fixed top-3 left-1/2 -translate-x-1/2 px-4 py-2 rounded-md {{ session('success') === 'success' ? 'bg-green-500' : 'bg-red-500' }}">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>

 @endif
