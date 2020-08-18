@extends('layouts.app')

@section('content')
    <h3>Skelbimų sąrašas</h3>
    <div class="posts">
        @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    <h4>{{$post->title}}</h4>
                    <span>{{$categories->find($post->category_id)->title}} - {{$subcategories->find($post->subcategory_id)->title}}</span>
                </div>
                <div class="card-body">
                    <span>{{$post->description}}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
