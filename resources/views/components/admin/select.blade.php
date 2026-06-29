<select {{ $attributes->merge([

    'class' =>

        'w-full
rounded-xl
border
border-slate-700
bg-slate-800
px-4
py-3
text-slate-200
focus:border-blue-500
focus:ring-2
focus:ring-blue-500/30
outline-none
transition'

]) }}>

    {{ $slot }}

</select>