<div class="w-full min-h-screen">
    <x-lma.header-page group="Auth/ Admins" page="Create" />
    <x-lma.box.create listing="{{route('admin.auth.admins')}}" >
        @if($user)
        <x-lma.form.field name="user" label="User">
            <table>
                <tr><th width="10">ID:</th><th>{{$user->id}}</th></tr>
                <tr><th>Name:</th><th>{{$user->name}}</th></tr>
            </table>
        </x-lma.form.field>
        @endif
        <x-lma.form.input type="number" name="record_id" label="User id" />
        <x-lma.form.checkbox-multi name="role_ids" label="Roles" :params="$roles" />
    </x-lma.box.create>
</div>
