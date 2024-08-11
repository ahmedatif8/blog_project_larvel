@extends('layout.app')
@section('content')
<div class="col-12">
                <a href="{{url('posts/create')}}" class="btn btn-primary my-3">add new post</a>
                <h1 class="p-3 border text-center my-3">All posts</h1>
            </div>
            <div class="col-12">
                <div class="card">
                @if (session()->get('success'))
            <h3 class="text-success my-2">{{session()->get('success')}}</h3>

        @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>description</th>
                                <th>writer</th>
                                <th>view</th>
                                <th>edit</th>
                                <th>delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{\Str::limit($post->description,50)}}</td>
                                <td>{{$post->user->name}}</td>
                                <td><a href="{{url('posts/'.$post->id)}}" class="btn btn-success">view</a></td>
                                <td><a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-info">edit</a></td>
                                <td>
                                    <form action="{{url('posts/'.$post->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div>
                        {{$posts ->links()}}
                    </div>
                </div>
            </div>
@endsection
