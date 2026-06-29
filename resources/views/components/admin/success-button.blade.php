<button

{{ $attributes->merge([

'class'=>'inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 px-5 py-3 rounded-xl transition text-white font-medium'

]) }}>

{{ $slot }}

</button>