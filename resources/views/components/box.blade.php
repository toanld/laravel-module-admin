@props(['header'=>'','footer'=>''])
<div class="w-full bg-white rounded-b text-sm shadow-lg">
    <div class="w-full flex items-center px-2 border-teal-700  border-t-4">
        {!! $header !!}
    </div>
    <div class="w-full block">
        {{$slot}}
    </div>
    {!! $footer !!}
</div>
