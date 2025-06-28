@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5">
            {{ __('task.edit.header') }}
        </h1>

        <form method="POST" action="{{ route('tasks.update', $task) }}" class="w-50">
            @csrf
            @method('PATCH')
            @include('task.form')
        </form>
    </div>
@endsection
