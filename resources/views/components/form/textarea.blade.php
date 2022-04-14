@props(["name","label"=>null,'mode'=>'.debounce.300ms',"class"=>"",'placeholder'=>null,'rows'=>5])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';


@endphp
<x-lma.form.field :name="$name" :label="$label">
    <textarea wire:model{{$mode}}="{{$name}}" placeholder="{{$placeholder}}"
             {{$attributes}} rows="{{$rows}}" class="w-full  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"></textarea>
</x-lma.form.field>
