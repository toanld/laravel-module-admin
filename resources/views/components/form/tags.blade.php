@props(["name","data"=>[],"label"=>null,'mode'=>'.debounce.600ms',"class"=>"",'type'=>'text','placeholder'=>null])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::headline($name)).'...';

@endphp
<x-lma.form.field :name="$name" :label="$label">
    <div class="w-full flex items-start flex-wrap">
        @foreach($data as $k=>$value)
            <span class="flex-none flex items-center m-1 bg-green-100 text-xs border-green-700 border">
                <span class="flex-1 px-1">{{$value}}</span>
                <span class="flex-none cursor-pointer" wire:click="removeItem('{{$name}}',{{$k}})">{!! lmaIcon("close") !!}</span>
            </span>
        @endforeach
    </div>
    <div class="w-full flex my-2" x-data="{ param: '', addItem() {
            $wire.addItem('{{$name}}',this.param);
            this.param='';
        } }">
        <input x-model="param" type="{{$type}}" @keyup.enter="addItem()"  placeholder="{{$placeholder}}" {{$attributes}} class="w-full flex-auto  p-1 px-2 text-sm @error($name) border-orange-500 text-orange-500 @enderror"/>
        <label class="flex-none cursor-pointer w-8 flex items-center justify-center border-gray-700 border border-l-0 bg-green-600 text-white hover:bg-green-700" @click="addItem()">{!! lmaIcon("add-circle") !!}</label>
    </div>
</x-lma.form.field>
