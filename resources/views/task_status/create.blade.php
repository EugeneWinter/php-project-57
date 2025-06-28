@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5 text-white">{{ __('task_status.create.header') }}</h1>

        <div class="flex flex-col">
            <form method="POST" action="{{ route('task_statuses.store') }}" class="w-50">
                @csrf
                @include('task_status.form')
            </form>
        </div>
    </div>
@endsection

