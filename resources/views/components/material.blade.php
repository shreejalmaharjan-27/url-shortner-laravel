@props(['name'])

<span {{ $attributes->merge(['class' => 'material-symbols-outlined']) }}>
    {{ $name }}

</span>
