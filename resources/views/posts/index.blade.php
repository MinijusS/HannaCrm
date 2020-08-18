@extends('layouts.app')

@section('content')
    <h3>Skelbimų sąrašas</h3>
    <div class="posts">
        @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    <h4>{{$post->title}}</h4>
                    <span>{{$post->category_id}} - {{$post->subcategory_id}}</span>
                </div>
                <div class="card-body">
                    <span>{{$post->description}}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
