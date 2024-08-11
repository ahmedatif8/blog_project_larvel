@extends('layout.app')
@section('content')
<div class="col-12">
                <h1 class="p-3 border text-center my-3">All posts</h1>
            </div>
            @foreach ($posts as $post )


            <div class="col-12">
                <div class="card my-3">
                    <div class="card-header">
                    {{$post->user->name}}- {{$post->created_at->format('y-m-d')}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}.</p>
                        <a href="{{url('posts/'.$post->id)}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div>
                {{$posts->links()}}
            </div>
@endsection
