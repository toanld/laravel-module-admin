@props(["name","search","label"=>null,"class"=>"",'placeholder'=>null,"val"=>[],"default"=>[],"params"=>[]])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';

 if(empty($default)){
     $default = [$placeholder];
 }
@endphp
<x-lma.form.field :name="$name" :label="$label">
    <div x-data="{ open : false}" class="w-full relative">
        <div class="w-full flex flex-wrap">
            @foreach($val as $iv)
                @if(data_get($params,$iv))
                    <span class="bg-green-100 flex-none flex border-green-200 m-1 border text-xs items-center px-1">{{data_get($params,$iv)}}
                    <label class="flex items-center justify-center cursor-pointer">
                        <input class="hidden" name="{{$name}}" wire:model="{{$name}}" type="checkbox" value="{{$iv}}">
                        {!! lmaIcon("close",12) !!}
                    </label>
                    </span>
                @endif
            @endforeach
            <label class="btn inline-flex" for="{{$search}}" @click="open = !open;">
                <span class="pr-2">{{$placeholder}}</span>
                <span class="border-l flex-none pl-1 flex items-center justify-center">{!! lmaIcon("expand-down") !!}</span>
            </label>
        </div>
        <div x-show="open" class="w-full border bg-white absolute left-0 top-0 right-0 z-30 shadow">
            <span class="block  p-2">
                <input id="{{$search}}" class="w-full p-1" type="text" wire:model="{{$search}}" placeholder="{{$placeholder}}"/>
            </span>
            <ul class="w-full max-h-96 overflow-auto">
                <li class="w-full border-t">
                    <label @click="open = false" class="flex p-2 items-center hover:bg-gray-100 cursor-pointer">
                        <span class="flex-1">{{$placeholder}}</span>
                    </label>
                </li>
                @foreach($params as $k => $param)
                    <li class="w-full border-t">
                        <label @click="open = false" class="flex p-2 items-center hover:bg-gray-100 cursor-pointer">
                            <input class="mr-2" id="{{$name}}-{{$k}}" type="checkbox" name="{{$name}}" wire:model="{{$name}}" value="{{$k}}">
                            <span class="flex-1">{{$param}}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-lma.form.field>
