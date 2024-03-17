
@include('backend/user/user/component/breadcrumb', ['title' => $config['seo']['create']['title']])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = ($config['method'] == 'create') ? route('user.store') : route('user.update', $user->id);    
@endphp

<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInleft">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">Thông tin chung</div>
                <div class="panel-description">
                    <p> - Nhập thông tin người dùng </p>
                    <p> - <strong>Lưu ý:</strong> Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc </p>
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
                        @php
                            $userCatalogue = [
                                '[Chọn nhóm thành viên]',
                                'Quản trị viên',
                                'Cộng tác viên',
                            ]   
                        @endphp
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Nhóm thành viên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="user_catalogue_id" class="form-control setupSelect2" id="">
                                        @foreach ($userCatalogue as $key => $item)
                                            <option {{ $key == old('user_catalogue_id', 
                                            (isset($user->user_catalogue_id)) ?
                                            $user->$user_catalogue_id : '') ? '' : 'selected' }} 
                                            value="{{ $key }}">{{ $item }}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Ngày sinh
                                    </label>
                                    <input 
                                    type="date" 
                                    name="birthday"
                                    value=""
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control">
                                </div>
                            </div>
                        </div>
                        @if ($config['method'] == 'create')
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="password"  
                                    name="password"
                                    value=""
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Nhập lại mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="password" 
                                    name="re_password"
                                    value=""
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control">
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Ảnh đại diện
                                    </label>
                                    <input 
                                    type="text" 
                                    name="image"
                                    value="{{ old('image', $user->image ?? '') }}"
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control input-image"
                                    data-upload="Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">Thông tin liên hệ</div>
                <div class="panel-description">
                    <p> - Nhập thông tin liên hệ của người dùng</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-tile">
                        <h5>Thông liên hệ</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Thành phố</label>
                                    <select name="province_id" class="form-control province setupSelect2 location" data-target="districts">
                                        <option value="0">[Chọn Thành Phố]</option>
                                        @if (isset($provinces))
                                            @foreach ($provinces as $province)
                                            <option value="{{ $province->code }}">{{ $province->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Quận/Huyện
                                    </label>
                                    <select name="district_id" class="form-control setupSelect2 districts location" data-target="wards">
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Phường/Xã
                                    </label>
                                    <select name="ward_id" class="form-control wards setupSelect2" id="">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Địa chỉ
                                    </label>
                                    <input 
                                    type="text" 
                                    name="address"
                                    value="{{ old('address', ($user->address) ?? '') }}"
                                    placeholder=""
                                    autocomplete="off"
                                    class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Số điện thoại
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="text" 
                                    name="phone"
                                    value="{{ old('phone', ($user->phone) ?? '') }}" 
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
                                    value="{{ old('description', ($user->description) ?? '') }}"
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
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>