@extends('layouts.generic')

@section('head')
    <title>{{ env('APP_NAME') }}</title>
@endsection

@section('body')
<div class="flex justify-center items-center h-screen w-screen flex-col">
    <x-form action="{{ route('url.generate') }}" method="POST" class="p-4 md:p-6 bg-white rounded-lg shadow" id="urlForm">
        <h1 class="md:text-4xl text-xl font-bold mb-3">Generate shortened URL</h1>
        <div class="form-control space-y-2 md:flex-row md:items-baseline md:space-x-2 md:justify-between">
            <input name="url" class="input input-bordered w-full" placeholder="Long URL" required id="url">
            <button type="submit" class="btn btn-md">Shorten</button>
        </div>
        <div class="form-control p-4 bg-success rounded-lg mt-4 hidden" id="shortened_url_container">
            <label class='label font-bold text-xl'>Your Shortened URL</label>
            <div class="flex flex-col md:flex-row space-y-2 md:space-x-2 md:justify-between md:items-end">
                <input class="input input-success w-full" id="shortened_url" readonly/>
                <button class="btn btn-md btn-secondary copy gap-2" type="button" data-clipboard-target="#shortened_url">
                    <x-far-copy class="h-6 w-6"/>
                    Copy
                </button>
            </div>
        </div>
    </x-form>
</div>

<script>
    const form = document.getElementById('urlForm');
    const valueContainer = document.getElementById('shortened_url_container');
    const show = document.getElementById('shortened_url');
    const input = document.getElementById('url');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        valueContainer.classList.add('hidden');

        input.classList.remove('input-error');
        let response = fetch(form.action, {
            method: 'POST',
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            if (data['error']) {
                alert(data['error'],'error');
                show.value = '';
                valueContainer.classList.add('hidden');
                input.classList.add('input-error');
                return;
            }

            show.value = '{{ Config::get('app.url') }}'+"/"+data['data']['shortUrl'];
            valueContainer.classList.remove('hidden');

        });
    });
</script>
@endsection
