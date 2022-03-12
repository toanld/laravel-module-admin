@props(['header'=>'','footer'=>''])
<div class="w-full bg-white rounded-b text-sm shadow-lg">
    <div class="w-full h-12  flex items-center px-2 border-teal-700  border-t-4">
        {!! $header !!}
    </div>
    <div class="w-full block p-2">
        {{$slot}}
    </div>
    <div class="w-full flex border-t">
        {!! $footer !!}
    </div>
</div>
