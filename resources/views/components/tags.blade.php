@props(['params'])
<div class="w-full flex flex-wrap ">
    @foreach($params as $param)
        <span class="flex-none bg-green-100 text-xs border-green-500 border px-1 m-0.5">{{$param}}</span>
    @endforeach
</div>
