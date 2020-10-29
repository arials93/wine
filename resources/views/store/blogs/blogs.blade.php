@extends('store.layouts.master')

@section('title','Bài viết')

@section('main')
    @include('store.layouts.components.wrap-page',[
        'sub_page' => [
            ['name' => 'Bài viết'],
            ['name' => 'Danh sách bài viết']
        ]       
    ])

    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                @foreach ($blogs as $item)
                    @include('store.layouts.components.blog')
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{ $blogs->links('vendor.pagination.store-paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
