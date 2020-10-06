<!-- begin:: Breadcrumbs -->
<div class="kt-subheader__main">
    <h3 class="kt-subheader__title">
        {{$title_page}}</h3>
    <span class="kt-subheader__separator kt-hidden"></span>
    <div class="kt-subheader__breadcrumbs">
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="/admin" class="kt-subheader__breadcrumbs-link">
            Trang chủ
        </a>
        @foreach ($sub_page as $item)
            @if ($loop->last)
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">{{$item['name']}}</span>
            @else
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{$item['url']}}" class="kt-subheader__breadcrumbs-link">
                    {{$item['name']}}
                </a>
            @endif
        @endforeach
    </div>
</div>
<!-- end:: Breadcrumbs -->
