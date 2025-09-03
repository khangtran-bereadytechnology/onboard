@extends('layouts.layout')

@section('content')
    <div x-data="{ username: 'Trần Nguyên Khang' }">
        <h1 x-text="username" class="text-center font-bold text-2xl my-2 text-red-500"></h1>
    </div>
@endsection
