<div class="w-full min-h-screen">
    <x-lma-header-page group="Auth/Permissions" page="Create" />
    <x-lma-box-create listing="{{route('admin.auth.permissions')}}" >
        <x-lma-form-input type="text" name="name" label="Name" />
		<x-lma-form-input type="text" name="title" label="Title" />
		<x-lma-form-select  name="parent_id" label="Parent" :default="['ROOT']" :params="$parents" />
        <x-lma-form-checkbox-multi name="role_ids" label="Roles" :params="$roles" />
    </x-lma-box-create>
</div>
