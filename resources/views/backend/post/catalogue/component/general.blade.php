<div class="row mb-15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-lable text-left">
                Tiêu đề nhóm bài viết <span class="text-danger">(*)</span>
            </label>
            <input  type="text" name="name"
                    value="{{ old('name', $postCatalogue->name ?? '') }}" placeholder=""
                    autocomplete="off" class="form-control">
        </div>
    </div>
</div>
<div class="row mb-15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-lable text-left">
                Mô tả ngắn
                <span class="text-danger">(*)</span>
            </label>
            <textarea id="description" type="text" name="description"
                    value="{{ old('description', $postCatalogue->description ?? '') }}" placeholder=""
                    autocomplete="off" class="form-control ck-editor"></textarea>
        </div>
    </div>
</div>
<div class="row mb-15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-lable text-left">
                Nội dung
                <span class="text-danger">(*)</span>
            </label>
            <textarea id="content"  type="text" name="content"
                    value="{{ old('content', $postCatalogue->content ?? '') }}" placeholder=""
                    autocomplete="off" class="form-control ck-editor"></textarea>
        </div>
    </div>
</div>