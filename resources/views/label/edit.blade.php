@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5">
            {{ __('label.edit.header') }}
        </h1>

        <form method="POST" action="{{ route('labels.update', $label) }}" class="w-50">
            @csrf
            @method('PATCH')
            @include('label.form')
        </form>
    </div>
@endsection
