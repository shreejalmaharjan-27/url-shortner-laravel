@extends('layouts.generic')

@section('head')
    <title>{{ env('APP_NAME') }}</title>
@endsection

@section('body')
    <h1>Generate short url</h1>
    <x-form action="{{ route('url.generate') }}" method="POST">
        <input name="url">
        <button type="submit">Submit</button>
    </x-form>
@endsection
