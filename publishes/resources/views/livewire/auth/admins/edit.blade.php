<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth/ Admins" page="Edit" />
    <x-lma.box.edit listing="{{route('admin.auth.admins')}}" show="{{route('admin.auth.admins.show',['record_id'=>$record_id])}}">
        <x-lma.form.input type="text" name="name" label="Name" />
		<x-lma.form.input type="email" name="email" label="Email" />
		<x-lma.form.input type="password" name="password" label="Password" />
		<x-lma.form.toggle name="is_admin" label="Is admin" />
        <x-lma.form.checkbox-multi name="role_ids" label="Roles" :params="$roles" />
    </x-lma.box.edit>
</div>
