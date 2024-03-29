@include('backend/user/catalogue/component/breadcrumb',['title' => $config['seo']['index']['title']])

<form action="{{ route('user.catalogue.updatePermission') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInleft">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cấp quyền</h5>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th></th>    
                        @foreach ($userCatalogues as $userCatalogue)
                            <th class="center">{{ $userCatalogue->name }}</th>
                        @endforeach
                    </tr>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td><a href="" class="uk-flex uk-flex-middle uk-flex-space-between">
                            {{ $permission->name }}
                            <span style="color: red">{{ $permission->canonical }}</span>
                        </a></td>
                        @foreach ($userCatalogues as $userCatalogue)
                            <td>
                                <input {{ collect($userCatalogue->permissions)
                                ->contains('id', $permission->id) ? 'checked' : '' }} 
                                type="checkbox" name="permission[{{ $userCatalogue->id }}][]" 
                                value="{{ $permission->id }}" 
                                class="form-control">
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>