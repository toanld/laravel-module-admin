@props(["name","label"=>""])
<div class="w-full block md:flex pb-2 md:pb-4 @error($name) text-orange-500 @enderror">
    <label class="block md:w-1/4 md:text-right pr-4 pt-2 pb-1 font-bold text-gray-600 text-xs">{{$label}}:</label>
    <div class="w-full pb-2">
        {{$slot}}
        @error($name)<span class="block text-xs text-orange-500">{{$message}}</span>@enderror
    </div>
</div>
