@props(['listing'=>'','edit'=>null])
<div class="w-full bg-white rounded overflow-hidden text-sm shadow">
    <div class="w-full min-h-12   border-teal-500  border-t-4">
        <div class="w-full flex border-b items-center justify-between">
            <span class="flex-none text-gray-700 text-xl p-2">Show</span>
            <div class="flex-none p-2 grid gap-1 grid-flow-col">
                @if($listing)
                    <a class="btn-info" href="{{$listing}}">{!! lmaIcon('list') !!}<span
                            class="text">List</span></a>
                @endif
                @if($edit)
                    <a class="btn-primary" href="{{$edit}}">{!! lmaIcon('edit') !!}<span
                            class="text">Edit</span></a>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full flex p-2 py-5 justify-center">
        <table class="w-full max-w-screen-lg border">
            {{$slot}}
        </table>

    </div>
</div>
