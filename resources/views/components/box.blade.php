@props(['header'=>null,'label'=>'','footer'=>'','box'=>'full'])
<div class="box-form {{$box}}">
    <div class="box-title">
        <span class="flex-none text-gray-800  text-xl p-2">{{$label}}</span>
        <div class="flex-none p-2 grid gap-1">
          {!! $header !!}
        </div>
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
