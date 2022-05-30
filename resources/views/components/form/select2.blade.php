@props(["name","search","label"=>null,"class"=>"",'placeholder'=>null,"val"=>0,"default"=>[],"params"=>[]])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';

 if(empty($default)){
     $default = [$placeholder];
 }
@endphp
<x-lma.form.field :name="$name" :label="$label">
    <div x-data="{ open : false}" class="w-full relative" @click.away="open = false">
        <label class="btn inline-flex" for="{{$search}}" @click="open = !open;">
            <span class="pr-2">{{data_get($params,$val,$placeholder)}}</span>
            <span class="border-l flex-none pl-1 flex items-center justify-center">{!! lmaIcon("expand-down") !!}</span></label>
        <div x-show="open" class="w-full border bg-white absolute left-0 top-0 right-0 z-30 shadow">
            <span class="block  p-2">
                <input id="{{$search}}" class="form-input" type="search" wire:model="{{$search}}" placeholder="{{$placeholder}}"/>
            </span>
            <ul class="w-full max-h-96 overflow-auto">
                <li class="w-full border-t">
                    <label @click="open = false" class="flex p-2 items-center hover:bg-gray-100 cursor-pointer">
                        <input class="mr-2 hidden" type="radio" name="{{$name}}" wire:model="{{$name}}" value="0">
                        <span class="flex-1">{{$placeholder}}</span>
                    </label>
                </li>
                @foreach($params as $k => $param)
                    <li class="w-full border-t">
                        <label @click="open = false" class="flex p-2 items-center hover:bg-gray-100 cursor-pointer">
                            <input class="mr-2" id="{{$name}}-{{$k}}" type="radio" name="{{$name}}" wire:model="{{$name}}" value="{{$k}}">
                            <span class="flex-1">{{$param}}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-lma.form.field>
