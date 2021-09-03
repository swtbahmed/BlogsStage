@extends('backend.layout.master')

@section('title')
    Blog - Tags
@endsection


@section('styles')

@endsection


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Categories</h1>


    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
            <a href="{{route('tags.create')}}" class="float-right btn btn-success" >Add Tag</a>
        </div>
        <div class="card-body">
            The styling for this basic card example is created by using default Bootstrap
            utility classes. By using utility classes, the style of the card component can be
            easily modified with no need for any custom CSS!
        </div>

        <div class=" card-body">
            <table class="table table-striped table-bordered w-100" id="tags">
                <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>

                </tr>
                </thead>
                <tbody>
                @foreach($tag as $T)
                    <tr>
                        <th scope="col">{{ $T->name }}</th>
                        <th scope="col">{{ $T->created_at }}</th>
                        <th scope="col">{{ $T->updated_at }}</th>
                        <th>
                            <a href="{{ route('tag.edit',$T->id) }}">Edit</a>
                            <a href="{{ route('tag.destroy',$T->id) }}" onclick="return confirm('Are you sur')">Delete</a>

                        </th>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection


@section('scriptes')
    <script type="text/javascript"></script>


@endsection
