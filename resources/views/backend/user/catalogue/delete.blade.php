
@include('backend/user/catalogue/component/breadcrumb', ['title' => $config['seo']['delete']['title']])


<form action="{{ route('user.catalogue.destroy', $userCatalogue->id) }}" method="post" class="box">
    @csrf
    @method ('DELETE')
    <div class="wrapper wrapper-content animated fadeInleft">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">Thông tin chung</div>
                <div class="panel-description">
                    <p> Bạn chắc chắn muốn xóa nhóm thành viên có tên là: {{ $userCatalogue->name }}</strong>. </p>
                    <p><strong>Lưu ý: </strong> sau khi xóa sẽ không thể khôi phục. </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-tile">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Tên nhóm
                                    </label>
                                    <input 
                                    type="text" 
                                    name="name"
                                    value="{{ old('email', ($userCatalogue->name) ?? '')}}"
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Ghi chú
                                    </label>
                                    <input 
                                    type="text" 
                                    name="description"
                                    value="{{ old('description', ($userCatalogue->description) ?? '')}}"
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-danger" type="submit" name="send" value="send">Xóa bản ghi</button>
        </div>
    </div>
</form>