<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="center">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th class="center">Ảnh</th>
            <th class="center">Tên module</th>
            <th class="center">Thao tác</th>
        </tr>
    </thead>
    
    <tbody>
        @if(isset($generates) && is_object($generates))
        @foreach ($generates as $generate)
        {{-- @php
            dd($generate->image);
        @endphp --}}
        <tr>
            <td class="center">
                <input type="checkbox" value="{{ $generate->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td class="center flag-table"> <img src="{{ $generate->image }}" alt=""> </td>
            <td class="center"> {{ $generate->name }} </td>
            <td class="center"> {{ $generate->canonical }} </td>
            <td class="center"> {{ $generate->description }} </td>
            <td class="text-center"> 
                <input type="checkbox" value="{{ $generate->publish }}" 
                class="js-switch status" data-field="publish" data-model="generate" 
                {{ ($generate->publish == 2) ? 'checked' : '' }} data-modelId="{{ $generate->id }}" />
            </td>
            <td class="text-center"> 
                <a href="{{ route('generate.edit', $generate->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{ route('generate.delete', $generate->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    @endif
    
    </tbody>
</table>

<div class="center">
    <div>{{ $generates->links('pagination::bootstrap-4') }}</div>
</div>