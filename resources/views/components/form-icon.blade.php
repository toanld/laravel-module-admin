@props(["name","label"=>null,"class"=>"",'placeholder'=>null,'val'=>''])
@php
    $label = $label!=""?$label:\Illuminate\Support\Str::title($name);
    $placeholder = $placeholder!=''?$placeholder:$label.'...';
    $icons = [];
    $path = public_path('assets/images/icons.svg');
    if(file_exists($path)){
            $str = file_get_contents($path);
            $icons = [];
            if (preg_match_all('/id=\"([a-z0-9-]*)\"/', $str, $arr)) {
                $icons = $arr[1];
            }
    }
@endphp
<x-lma-form-field :name="$name" :label="$label">
    <div x-data="{open : false}" class="w-full relative">
        <label @click="open=!open" class="btn-primary">@if($val) {!! lmaIcon($val) !!} <span class="text">{{$val}}</span> @else Icon @endif</label>
        <div x-show="open" @click.away="open = false" class="w-full h-60 overflow-auto border absolute bg-white ">
            <div class="w-full flex flex-wrap ">
                @foreach($icons as $ic)
                    <label @click="open = false" class="p-1 flex-auto cursor-pointer">
                        <input type="radio" class="hidden" wire:model="{{$name}}" value="{{$ic}}">
                        <span class="w-full border p-2 flex flex-col items-center @if($ic == $val) border-red-700 text-red-600 @endif">
                            {!! lmaIcon($ic,32) !!}
                            <span class="">{{$ic}}</span>
                        </span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
</x-lma-form-field>
