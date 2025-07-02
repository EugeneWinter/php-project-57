@extends('layouts.app')

@section('content')
    <div class="grid col-span-full text-white">
        <h1 class="mb-5">
            {{ __('task.create.header') }}
        </h1>

        <form method="POST" action="{{ route('tasks.store') }}" class="w-50">
            @csrf
            @include('task.form')
        </form>
    </div>
@endsection
