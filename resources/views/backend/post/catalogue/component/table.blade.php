<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="center">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th class="center">Tên nhóm</th>
            <th class="center">Số thành viên</th>
            <th class="center">Mô tả</th>
            <th class="center">Tình trạng</th>
            <th class="center">Thao tác</th>
        </tr>
    </thead>
    
    <tbody>
        @if(isset($postCatalogues) && is_object($postCatalogues))
        @foreach ($postCatalogues as $postCatalogue)
        <tr>
            <td class="center">
                <input type="checkbox" value="{{ $postCatalogue->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td class="center"> {{ $postCatalogue->name }} </td>
            <td class="center"> {{ $postCatalogue->posts_count }} người </td>
            <td class="center"> {{ $postCatalogue->description }} </td>
            <td class="text-center"> 
                <input type="checkbox" value="{{ $postCatalogue->publish }}" 
                class="js-switch status" data-field="publish" data-model="PostCatalogue" 
                {{ ($postCatalogue->publish == 2) ? 'checked' : '' }} data-modelId="{{ $postCatalogue->id }}" />
            </td>
            <td class="text-center"> 
                <a href="{{ route('post.catalogue.edit', $postCatalogue->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{ route('post.catalogue.delete', $postCatalogue->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    @endif
    
    </tbody>
</table>

<div class="center">
    <div>{{ $postCatalogues->links('pagination::bootstrap-4') }}</div>
</div>