@props(['name','val'])
<label class="w-8 h-2 relative rounded-l-full rounded-r-full bg-gray-300 inline-block cursor-pointer">
    <input type="checkbox" class="hidden toggle" value="1" {{$val==1? 'checked' : ''}} {{$attributes}} />
    <span class="dot w-4 h-4 block border bg-white rounded-full absolute transition -top-1 left-0"></span>
</label>
