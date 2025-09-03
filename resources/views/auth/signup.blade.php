@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-md">
            <h1 class="text-center font-bold text-2xl my-2">SIGN UP</h1>

            <form action="{{ route('auth.showSignup') }}" method="POST" class="max-w-sm mx-auto">
                @csrf
                <div class="mb-5">
                    <label for="name">Name</label>
                    <input name="name" type="name" id="name" class="bg-gray-100 w-full p-2.5 " placeholder="Name"
                        required />
                </div>
                <div class="mb-5">
                    <label for="email">Email</label>
                    <input name="email" type="email" id="email" class="bg-gray-100 w-full p-2.5 "
                        placeholder="beready@technology.com" required />
                </div>
                <div class="mb-5">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password" class="bg-gray-100 w-full p-2.5 "
                        placeholder="******" required />
                </div>

                @if ($errors->any())
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
                <div class="w-full rignt-0 text-right">Have account?<a href="{{ route('auth.showSignin') }}"
                        class="text-blue-600 font-semibold  ml-2">Sign in</a>
                </div>
            </form>
        </div>
    </div>
@endsection
