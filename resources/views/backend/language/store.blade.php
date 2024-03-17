@include('backend/language/component/breadcrumb', ['title' => $config['seo']['create']['title']])

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
    $url = $config['method'] == 'create' ? route('language.store') : route('language.update', $language->id);
@endphp

<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInleft">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-title">Thông tin chung</div>
                <div class="panel-description">
                    <p> - Nhập thông tin ngôn ngữ </p>
                    <p> - <strong>Lưu ý:</strong> Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc
                    </p>
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
                                    <input type="text" name="name"
                                        value="{{ old('name', $language->name ?? '') }}" placeholder=""
                                        autocomplete="off" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Canonical
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="canonical"
                                        value="{{ old('canonical', $language->canonical ?? '') }}" placeholder=""
                                        autocomplete="off" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Ảnh đại diện
                                    </label>
                                    <input type="text" name="image"
                                        value="{{ old('image', $language->image ?? '') }}"
                                        class="form-control input-image" data-upload="Images">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">
                                        Ghi chú
                                    </label>
                                    <input type="text" name="description"
                                        value="{{ old('description', $language->description ?? '') }}" placeholder=""
                                        autocomplete="off" class="form-control">
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
