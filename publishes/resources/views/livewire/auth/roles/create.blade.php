<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth/Roles" page="Create" />
    <x-lma.box.create listing="{{route('admin.auth.roles')}}" >
        <x-lma.form.input type="text" name="name" label="Name" />
		<x-lma.form.input type="text" name="title" label="Title" />
        <x-lma.form.field name="permission_ids" label="Permissions">
            <div class="w-full flex flex-wrap">
                @foreach($permissions as $permission)
                    <div class="p-1 flex-auto">
                        <div class="block w-full h-full border p-2 m-1 rounded bg-gray-50">
                            <label class="w-full bg-gray-50 border-b items-center flex p-1 cursor-pointer">
                                <input class="mr-1" type="checkbox" wire:model="permission_ids" value="{{$permission->id}}">
                                <span>{{$permission->title}}</span>
                            </label>
                            <div class="w-full pl-3">
                                @foreach($permission->children as $child)
                                    <label class="w-full items-center p-1 border-b flex cursor-pointer">
                                        <input class="mr-1" type="checkbox" wire:model="permission_ids" value="{{$child->id}}">
                                        <span>{{$child->title}}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </x-lma.form.field>
    </x-lma.box.create>
</div>
