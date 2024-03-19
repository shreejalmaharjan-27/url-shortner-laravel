@extends('layouts.generic')

@section('head')
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
@endsection

@section('body')
    <div class="flex justify-center items-center h-screen w-screen flex-col">
        <x-form action="{{ route('url.generate') }}" method="POST" class="p-4 md:p-6 bg-white rounded-lg shadow"
            id="urlForm">
            <h1 class="md:text-4xl text-xl font-bold mb-3">Generate shortened URL</h1>
            <div class="form-control md:flex-row gap-2 md:justify-between items-center">
                <input name="url" class="input input-bordered w-full" placeholder="Long URL" required id="url">
                <div class="flex flex-row justify-between md:justify-normal gap-2 w-full">
                    <button type="submit" class="btn w-[calc(100%-4.5rem)] md:btn-md">Shorten</button>
                    <button type="button" onclick="showOption()" class="btn btn-md"><x-material
                            name="more_vert" /></button>
                </div>
            </div>

            <div class="form-control rounded-lg mt-2 hidden" id="more_options">
                <input type="text" name="customShortUrl" class="input input-bordered w-full" placeholder="Custom URL" />
            </div>

            <div class="form-control p-4 bg-success rounded-lg mt-4 hidden" id="shortened_url_container">
                <label class='label font-bold text-xl'>Your Shortened URL</label>
                <div class="flex flex-col md:flex-row space-y-2 md:space-x-2 md:justify-between md:items-end">
                    <input class="input input-success w-full" id="shortened_url" readonly />
                    <button class="btn btn-md btn-secondary copy gap-2" type="button"
                        data-clipboard-target="#shortened_url">
                        <x-far-copy class="h-6 w-6" />
                        Copy
                    </button>
                </div>
            </div>
        </x-form>
    </div>

    <div class="fixed bottom-0 p-4">
        <a href="https://github.com/shreejalmaharjan-27/url-shortner-laravel" target="_blank"
            class="btn btn-md btn-secondary">
            <x-fab-github class="h-6 w-6 mr-2" />
            Github
        </a>
    </div>

    <script>
        function showOption() {
            const moreOptions = document.getElementById('more_options');
            if (moreOptions.classList.contains('hidden')) {
                moreOptions.classList.remove('hidden');
            } else {
                moreOptions.classList.add('hidden');
            }
        }

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
                    body: new FormData(form),
                    headers: {
                        "Authorization": "Bearer {{ Session::getId() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data['error']) {
                        alert(data['error'], 'error');
                        show.value = '';
                        valueContainer.classList.add('hidden');
                        input.classList.add('input-error');
                        return;
                    }

                    show.value = '{{ Config::get('app.url') }}' + "/" + data['data']['shortUrl'];
                    valueContainer.classList.remove('hidden');

                });
        });
    </script>
@endsection
