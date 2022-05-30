@props(['header'=>'','label'=>'','footer'=>'','box'=>'full'])
<div class="box-form {{$box}}">
    <div class="w-full flex items-center px-2 border-teal-700  border-t-4">
        <span class="text-teal-600 flex-none text-2xl font-bold">{{$label}}</span>
        <div class="flex-auto">{!! $header !!}</div>
    </div>
    <div class="box-container">
        {{$slot}}
        <div class="form-field">
            <span class="table-cell"></span>
            <div class="footer">
                {!! $footer !!}
            </div>
        </div>
    </div>
</div>
