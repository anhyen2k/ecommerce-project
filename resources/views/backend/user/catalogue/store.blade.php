
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
    $url = ($config['method'] == 'create') ? route('user.catalogue.store') : route('user.catalogue.update', $userCatalogue->id);    
@endphp

<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInleft">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">Thông tin chung</div>
                <div class="panel-description">
                    <p> - Nhập thông tin nhóm thành viên </p>
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
                                        Tên nhóm
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                    type="text" 
                                    name="name"
                                    value="{{ old('name', ($userCatalogue->name) ?? '')}}"
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
                        @php
                            $userCatalogue = [
                                '[Chọn nhóm thành viên]',
                                'Quản trị viên',
                                'Cộng tác viên',
                            ]   
                        @endphp
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>