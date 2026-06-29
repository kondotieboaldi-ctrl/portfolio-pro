<div {{ $attributes->merge([
'class'=>'bg-slate-900 border border-slate-800 rounded-2xl shadow-lg'
]) }}>

    @isset($header)

    <div class="px-6 py-4 border-b border-slate-800">

        {{ $header }}

    </div>

    @endisset

    <div class="p-6">

        {{ $slot }}

    </div>

</div>