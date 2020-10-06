<div class="col-lg-6 d-flex align-items-stretch ftco-animate">
    <div class="blog-entry d-md-flex">
        <a href="{{ route('store.blog', ['id'=>$item->id]) }}" class="block-20 img" style="background-image: url({{Storage::url($item->image)}});">
        </a>
        <div class="text p-4 bg-light">
            <div class="meta">
                <p><span class="fa fa-calendar"></span>{{$item->created_at->format('d-m-Y')}}</p>
            </div>
            <h3 class="heading mb-3">
                <a href="{{ route('store.blog', ['id'=>$item->id]) }}">{{$item->name}}</a>
            </h3>
            <p>{{Illuminate\Support\Str::words($item->sub_description,30)}}</p>
            <a href="{{ route('store.blog', ['id'=>$item->id]) }}" class="btn-custom">Đọc thêm <span class="fa fa-long-arrow-right"></span></a>

        </div>
    </div>
</div>
