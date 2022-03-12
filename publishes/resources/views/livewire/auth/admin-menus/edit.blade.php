<div class="w-full min-h-screen">
    <x-lma-header-page group="Auth/ Admin Menus" page="Edit" />
    <x-lma-box-edit listing="{{route('admin.auth.admin-menus')}}" show="{{route('admin.auth.admin-menus.show',['record_id'=>$record_id])}}">
        <x-lma-form-input type="text" name="route" label="Route" />
        <x-lma-form-icon name="icon" label="Icon" :val="$icon" />
        <x-lma-form-input type="text" name="name" label="Name" />
		<x-lma-form-select  name="parent_id" label="Parent id" :params="$parents" :default="['ROOT']" />
		<x-lma-form-select name="sort" label="Sort" :params="$sorts" />
		<x-lma-form-checkbox-multi  name="role_ids" label="Roles" :params="$roles" />

    </x-lma-box-edit>
</div>
