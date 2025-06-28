@extends('layouts.app')

@section('content')
            <div class="grid col-span-full">
                <h1 class="mb-5">
                    {{ __('task_status.edit.header') }}
                </h1>

                <form method="POST" action="{{ route('task_statuses.update', $taskStatus) }}" class="w-50">
                    @csrf
                    @method('PATCH')
                    @include('task_status.form')
                </form>
            </div>
@endsection
