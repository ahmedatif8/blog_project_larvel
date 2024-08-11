@extends('layout.app')
@section('content')
<div class="col-12">
    <h1 class="p-3 border text-center my-3">edit post</h1>
</div>
<div class="col-8 mx-auto">
    <form action="{{url('posts/'.$post->id)}}" method="post" class="form border p-3">
        @method('PUT')
        @csrf
        @if ($errors -> any())
            <div class="alert alert-danger p-1">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="">post title</label>
            <input type="text" name="title"value="{{$post->title}}" class="form-control" placeholder="title">
        </div>
        <div class="mb-3">
            <label for="">post description</label>
            <textarea name="description"  rows="7" value="{{$post->description}}" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="">post creator</label>
            <select name="user_id" class="form-control" >
                <option value="1">Ahmed</option>
                <option value="2">khaled</option>
                <option value="3">mohamed</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" value="update" class="form-control bg-info">
        </div>

    </form>

</div>
@endsection



