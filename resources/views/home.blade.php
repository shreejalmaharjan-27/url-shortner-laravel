@extends('layouts.generic')

@section('head')
    <title>{{ env('APP_NAME') }}</title>
@endsection

@section('body')
<div class="flex justify-center items-center h-screen w-screen flex-col">
    <x-form action="{{ route('url.generate') }}" method="POST" class="p-4 md:p-6 bg-white rounded-lg">
        <h1 class="md:text-4xl text-xl font-bold mb-3">Generate shortened URL</h1>
        <div class="form-control space-y-2 md:flex-row md:items-baseline md:space-x-2 md:justify-between">
            <input name="url" class="input input-bordered w-full" placeholder="Long URL">
            <button type="submit" class="btn btn-md">Submit</button>
        </div>
        <div class="flex justify-center items-center text-lg mt-2 space-x-2">
            <a href="https://github.com/shreejalmaharjan-27">
                Github
            </a>
        </div>
    </x-form>
</div>
@endsection
