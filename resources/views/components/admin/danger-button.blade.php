<button

{{ $attributes->merge([

'class'=>'inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 px-5 py-3 rounded-xl transition text-white font-medium'

]) }}>

{{ $slot }}

</button>