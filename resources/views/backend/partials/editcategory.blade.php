
@extends('backend.layout.master')

@section('title')
    Blog - Categories - Edit
@endsection


@section('styles')

@endsection


@section('content')
    <div class="card card-default">
        <div class="card-header">
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{$error}}
                                </li>
                            @endforeach

                        </ul>
                    </div>
                @endif
                <form action="{{route('categories.update',$category->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category  Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection


@section('scriptes')


@endsection
