@extends('layout.app')
@section('content')
<div class="col-12">
    <h1 class="p-3 border text-center my-3">add post</h1>
</div>
<div class="col-8 mx-auto">
    <form action="{{url('posts')}}" method="post" class="form border p-3">
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
        @if (session()->get('success'))
            <h3 class="text-success my-2">{{session()->get('success')}}</h3>

        @endif
        <div class="mb-3">
            <label for="">post title</label>
            <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="title">
        </div>
        <div class="mb-3">
            <label for="">post description</label>
            <textarea name="description"  rows="7" value="{{old('description')}}"  class="form-control"></textarea>
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
            <input type="submit" value="create" class="form-control bg-success">
        </div>

    </form>

</div>
@endsection



