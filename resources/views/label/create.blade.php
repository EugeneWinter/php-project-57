@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5 text-white">
            {{ __('label.create.header') }}
        </h1>

        <form method="POST" action="{{ route('labels.store') }}" class="w-50">
            @csrf
            @include('label.form')
        </form>
    </div>
@endsection
