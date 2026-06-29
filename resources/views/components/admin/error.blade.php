@props(['name'])

@error($name)

<p class="mt-2 text-red-500 text-sm">

    {{ $message }}

</p>

@enderror