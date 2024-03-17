<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình Seo</h5>
        <div class="ibox-content">
            <div class="seo-container">
                <div class="meta-title">
                    <p>
                        Laravel - Một framework web PHP hiện đại và mạnh mẽ
                    </p>
                </div>
                <div class="canonical">
                    <p>
                        https://cloud.z.com/vn/vi/news/laravel/
                    </p>
                </div>
                <div class="meta-description">
                    <p>
                        Laravel là một framework PHP phổ biến và mạnh mẽ, được sử dụng rộng rãi để phát triển các ứng dụng web động hiện đại. Nó có nhiều tính năng hữu ...
                    </p>
                </div>
            </div>
            <div class="seo-wrapper">
                <div class="row mb-15">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <span> Mô tả SEO </span>
                                    <span class="count_meta-title"> 0 ký tự </span>
                                </div>
                            </label>
                            <input  type="text" name="meta_title"
                                    value="{{ old('meta_title', $postCatalogue->name ?? '') }}" placeholder=""
                                    autocomplete="off" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-15">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">
                                <span> Từ khóa SEO </span>
                            </label>
                            <input  type="text" name="meta_keyword"
                                    value="{{ old('meta_keyword', $postCatalogue->name ?? '') }}" placeholder=""
                                    autocomplete="off" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-15">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <span> Mô tả SEO </span>
                                    <span class="count_meta-title"> 0 ký tự </span>
                                </div>
                            </label>
                            <textarea  type="text" name="meta_description"
                                    value="{{ old('meta_description', $postCatalogue->name ?? '') }}" placeholder=""
                                    autocomplete="off" class="form-control">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-15">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <label for="" class="control-lable text-left">
                                <span> Đường dẫn </span>
                            </label>
                            <input  type="text" name="canonical"
                                    value="{{ old('canonical', $postCatalogue->name ?? '') }}" placeholder=""
                                    autocomplete="off" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>