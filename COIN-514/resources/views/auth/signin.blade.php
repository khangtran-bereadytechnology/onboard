@extends('layouts.layout')

@section('content')
    <div>
        <h1 class="text-center font-bold text-2xl my-2">SIGN IN</h1>

        <form action="{{ route('auth.showSignin') }}" method="POST" class="max-w-sm mx-auto">
            @csrf

            <div class="mb-5">
                <label for="email">Email</label>
                <input name="email" type="email" id="email" class="bg-gray-100 w-full p-2.5 "
                    placeholder="superadmin@example.com" required value="superadmin@example.com" />
            </div>
            <div class="mb-5">
                <label for="password">Password</label>
                <input name="password" type="password" id="password" class="bg-gray-100 w-full p-2.5 " placeholder="******"
                    required value="111111"/>
            </div>
            @if ($errors->all())
                <div class="mb-5 bg-red-100 text-red-500 px-2 py-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="text-white bg-blue-700 font-semibold w-full px-5 py-2.5 text-center">Sign
                in</button>
        </form>
    </div>
@endsection
