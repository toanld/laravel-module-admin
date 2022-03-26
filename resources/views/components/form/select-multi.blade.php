@props(["name","label"=>null,"class"=>"",'placeholder'=>null,"default"=>[],"params"=>[],"vals"=>[]])
@php
    $placeholder = ($placeholder!=''?$placeholder:Illuminate\Support\Str::title($name)).'...';


@endphp
<x-lma.form.field :name="$name" :label="$label">
    <div class="w-full block">
        @foreach($vals as $val)
            @if(isset($params[$val])) <span class="inline-block">{{$params[$val]}}</span>@endif
         @endforeach
    </div>
    <div class="w-full block">
        <ul class="w-full block">
            @foreach($params as $k=>$param)
                <li class="w-full flex p-2 border-b">
                    <span><input wire:model="{{$name}}" value="{{$k}}" type="checkbox"></span>
                    <span class="flex-1">{{$param}}</span>
                </li>
            @endforeach
        </ul>
    </div>
</x-lma.form.field>
