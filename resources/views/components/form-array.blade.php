@props(["name","data"=>[],"label"=>null,'mode'=>'.debounce.600ms',"class"=>"",'type'=>'text','placeholder'=>null])
@php
$label = $label!=""?$label:\Illuminate\Support\Str::title($name);
$placeholder = $placeholder!=''?$placeholder:$label.'...';

@endphp
<x-lma-form-field :name="$name" :label="$label">

    @if(empty($data))
        <input wire:model{{$mode}}="{{$name}}.0" type="{{$type}}" placeholder="{{$placeholder}}" {{$attributes}} class="w-full  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
    @else
        @foreach($data as $k=>$value)
            <div class="w-full flex my-2">
                <input wire:model{{$mode}}="{{$name}}.{{$k}}" type="{{$type}}" placeholder="{{$placeholder}}" {{$attributes}} class="w-full flex-auto  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
                <label class="flex-none cursor-pointer w-8 flex items-center justify-center border-gray-700 border border-l-0 hover:bg-gray-100" wire:click="removeItem('{{$name}}',{{$k}})">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg></label>
            </div>
        @endforeach
            <input wire:model{{$mode}}="{{$name}}.{{max(array_keys($data))+1}}" type="{{$type}}" placeholder="{{$placeholder}}" {{$attributes}} class="w-full  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
    @endif
</x-lma-form-field>
