@extends('layouts.layout')

@section('content')
    <div id="bg" class="flex items-center justify-center text-xl">
        <div class="w-full max-w-2xl flex flex-col p-3 gap-2">
            {{-- Info --}}
            @include('tasks.info')

            {{-- FIlter --}}
            @include('tasks.filter')

            <!-- Danh sách task -->
            @include('tasks.list')

            <!-- Danh sách task -->
            @include('tasks.create')
        </div>
    </div>
@endsection
