@props(["name","data"=>[],"label"=>null,'mode'=>'.debounce.600ms',"class"=>"",'type'=>'text','placeholder'=>null])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';

@endphp
<x-lma.form.field :name="$name" :label="$label">
    @php
        if(empty($data)) $data[]='';
    @endphp
    @foreach($data as $k=>$value)
        <div class="w-full flex my-2">
            <input wire:model{{$mode}}="{{$name}}.{{$k}}" type="{{$type}}" placeholder="{{$placeholder}}" {{$attributes}} class="w-full flex-auto  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
            <label class="flex-none cursor-pointer w-8 flex items-center justify-center border-gray-700 border border-l-0 hover:bg-gray-100" wire:click="removeItem('{{$name}}',{{$k}})">
               {!! lmaIcon("close") !!}
            </label>
        </div>
    @endforeach
    <label class="btn-success  sm  float-right" wire:click="$set('{{$name}}.{{$k+1}}','')">{!! lmaIcon("add-circle",12) !!}</label>
</x-lma.form.field>
