<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="center">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th class="center">Ảnh</th>
            <th class="center">Tên ngôn ngữ</th>
            <th class="center">Canonical</th>
            <th class="center">Mô tả</th>
            <th class="center">Tình trạng</th>
            <th class="center">Thao tác</th>
        </tr>
    </thead>
    
    <tbody>
        @if(isset($languages) && is_object($languages))
        @foreach ($languages as $language)
        {{-- @php
            dd($language->image);
        @endphp --}}
        <tr>
            <td class="center">
                <input type="checkbox" value="{{ $language->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td class="center flag-table"> <img src="{{ $language->image }}" alt=""> </td>
            <td class="center"> {{ $language->name }} </td>
            <td class="center"> {{ $language->canonical }} </td>
            <td class="center"> {{ $language->description }} </td>
            <td class="text-center"> 
                <input type="checkbox" value="{{ $language->publish }}" 
                class="js-switch status" data-field="publish" data-model="language" 
                {{ ($language->publish == 2) ? 'checked' : '' }} data-modelId="{{ $language->id }}" />
            </td>
            <td class="text-center"> 
                <a href="{{ route('language.edit', $language->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{ route('language.delete', $language->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    @endif
    
    </tbody>
</table>

<div class="center">
    <div>{{ $languages->links('pagination::bootstrap-4') }}</div>
</div>