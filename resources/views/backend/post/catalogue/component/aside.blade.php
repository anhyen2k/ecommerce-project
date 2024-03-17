<div class="ibox">
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-lable text-left">
                        Chọn danh mục cha
                        <span class="text-danger">(*)</span>
                    </label>
                    <span class="text-danger notice">* Chọn Root nếu không có danh mục cha</span>
                    <select name="" id="" class="form-control setupSelect2">
                        <option value="0">Chọn danh mục cha</option>
                        <option value="1">Root</option>
                        <option value="2">...</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5>Chọn ảnh đại diện</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="form-row">
                        <span class="image img-cover">
                            <img src="{{ asset('img/no-image.png') }}" alt="">
                        </span>
                        <input type="hidden" name="image" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5>Chọn tình trạng</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb10">
                        <select name="" id="" class="form-control setupSelect2">
                            @foreach (config('apps.genneral.publish') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <select name="" id="" class="form-control setupSelect2">
                        @foreach (config('apps.genneral.follow') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>