
@include('backend/permission/component/breadcrumb',['title' => $config['seo']['index']['title']])
<div class="row mt20">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5> {{ $config['seo']['index']['table'] }} </h5>
            @include('backend/permission/component/toolbox')
        </div>
        <div class="ibox-content">
            @include('backend/permission/component/filter')
            @include('backend/permission/component/table')
        </div>
    </div>
</div>
</div>

{{-- <script>
    $(document).ready(function() {
        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(this, { color: '#1AB394' });
    })
</script> --}}