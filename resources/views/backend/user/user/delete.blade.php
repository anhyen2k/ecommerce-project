
@include('backend/user/user/component/breadcrumb', ['title' => $config['seo']['delete']['title']])


<form action="{{ route('user.destroy', $user->id) }}" method="post" class="box">
    @csrf
    @method ('DELETE')
    <div class="wrapper wrapper-content animated fadeInleft">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">Thông tin chung</div>
                <div class="panel-description">
                    <p> Bạn muốn xóa thành viên <strong>{{ $user->name }}</strong> có email là: <strong>{{ $user->email }}</strong>. </p>
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
                                        Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="text" 
                                    name="email"
                                    value="{{ old('email', ($user->email) ?? '')}}"
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Họ tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="text" 
                                    name="name"
                                    value="{{ old('name', ($user->name) ?? '')}}"
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