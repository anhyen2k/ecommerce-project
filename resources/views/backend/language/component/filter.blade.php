<form action="{{ route('language.index') }}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            @php
                $perpage = request('perpage') ?: old('perpage');    
            @endphp
            <div class="perpage">
                <div class="uk-flex ukflex-middle uk-flex-space-between">
                    <select name="perpage" class="form-control input-sm perpage filter mr10">
                        @for ($i = 20; $i <= 200; $i+=20)
                            <option {{ ($perpage == $i) ? 'selected' : '' }} value="{{$i}}">{{ $i }}</option>
                        @endfor
                    </select>
                    
                </div>
            </div>
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    @php
                        $publish = request('publish') ?: old('publish');
                    @endphp
                    <select name="publish" class="form-control mr10 setupSelect2">
                        @foreach (config('apps.genneral.publish') as $key => $val)
                        <option {{ ($publish == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    <div class="uk-search uk-flex ukflex-middle mr10">
                        <div class="input-group">
                            <input 
                            type="text"
                            name="keyword"
                            value="{{ request('keyword') ?: old('keyword') }}"
                            placeholder="Nhập từ khóa tìm kiếm..."
                            class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" name="search" value="search"
                                class="btn btn-primary mb0 btn-sm">Tìm kiếm</button>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('language.create') }}" class="btn btn-danger"><i class="fa fa-plus">&ensp; Thêm mới</i></a>
                </div>
            </div>
        </div>
    </div>
</form>