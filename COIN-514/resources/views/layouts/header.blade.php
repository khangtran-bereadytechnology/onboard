<div class="w-full h-[60px] bg-teal-100 flex items-center font-semibold text-teal-950">
    <div class="flex flex-row w-full max-w-[900px] justify-between mx-auto px-3">
        <div class="flex flex-row gap-3">
            <a href="/">Home</a>
            <a href="/admin">Admin</a>
        </div>
        <div>
            @auth
                <span>{{ Auth::user()->name }}</span>,
                <form action="{{ route('auth.signout') }}" method="POST" class="inline ml-2">
                    @csrf
                    <button type="submit" class="hover:cursor-pointer">Sign out</button>
                </form>
            @else
                <a href="/auth/signin" class="ml-2">Sign in</a>
            @endauth
        </div>
    </div>
</div>
