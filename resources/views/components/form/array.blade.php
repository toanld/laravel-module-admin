@props(["name","params"=>[],"label"=>null,'mode'=>'.debounce.600ms',"class"=>"",'type'=>'text','placeholder'=>null])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';

@endphp
<x-lma.form.field :name="$name" :label="$label">
    @foreach($params as $k=>$value)
        <div class="w-full flex my-2">
            <input wire:model{{$mode}}="{{$name}}.{{$k}}" type="{{$type}}" placeholder="{{$placeholder}}" {{$attributes}} class="w-full flex-auto  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
            <label class="flex-none cursor-pointer w-8 flex items-center justify-center border-gray-700 border border-l-0 hover:bg-gray-100" wire:click="removeItem('{{$name}}',{{$k}})">
                {!! lmaIcon("close") !!}
            </label>
        </div>
    @endforeach
    <div class="w-full flex my-2" x-data="{ param: '', addItem() {
            $wire.addItem('{{$name}}',this.param);
            this.param='';
        } }">
        <input x-model="param" type="{{$type}}" @keyup.enter="addItem()"  placeholder="{{$placeholder}}" {{$attributes}} class="w-full flex-auto  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
        <label class="flex-none cursor-pointer w-8 flex items-center justify-center border-gray-700 border border-l-0 bg-green-600 text-white hover:bg-green-700" @click="addItem()">{!! lmaIcon("add-circle") !!}</label>
    </div>
</x-lma.form.field>
