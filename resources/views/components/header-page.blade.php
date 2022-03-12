@props(['group'=>'','page'=>'','breadcrump'=>null])
<div class="w-full flex">
    <div class="float-left flex-none  pb-2">
        <span class="text-2xl">{{$group}}</span>
        <span class="text-gray-700">{{$page}}</span>
    </div>
    <div class="flex-auto"></div>
    <div class="flex-none">{{$breadcrump}}</div>
</div>
