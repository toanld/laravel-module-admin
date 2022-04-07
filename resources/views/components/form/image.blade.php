@props(["name","label"=>null,"url"=>null])
<x-lma.form.field :name="$name" :label="$label">
    <label class="w-20 block cursor-pointer">
        <span class="w-full mb-2 h-20 flex items-center overflow-hidden justify-center border ">
            <img class="w-full max-h-full" src="{{$url}}">
        </span>
        <input type="file" wire:model="{{$name}}">
    </label>
</x-lma.form.field>
