<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth/Permissions" page="Edit" />
    <x-lma.box.edit listing="{{route('admin.auth.permissions')}}" show="{{route('admin.auth.permissions.show',['record_id'=>$record_id])}}">
        <x-lma.form.input type="text" name="name" label="Name" />
		<x-lma.form.input type="text" name="title" label="Title" />
        <x-lma.form.select  name="parent_id" label="Parent" :default="['ROOT']" :params="$parents" />
        <x-lma.form.checkbox-multi name="role_ids" label="Roles" :params="$roles" />
    </x-lma.box.edit>
</div>
