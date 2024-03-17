<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="center">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th class="center">Tên ngôn ngữ</th>
            <th class="center">Canonical</th>
            <th class="center">Thao tác</th>
        </tr>
    </thead>
    
    <tbody>
        @if(isset($permissions) && is_object($permissions))
        @foreach ($permissions as $permission)
        {{-- @php
            dd($permission->image);
        @endphp --}}
        <tr>
            <td class="center">
                <input type="checkbox" value="{{ $permission->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td class="center"> {{ $permission->name }} </td>
            <td class="center"> {{ $permission->canonical }} </td>
            <td class="text-center"> 
                <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{ route('permission.delete', $permission->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    @endif
    
    </tbody>
</table>

<div class="center">
    <div>{{ $permissions->links('pagination::bootstrap-4') }}</div>
</div>