@extends('backend.layout.master')

@section('title')
    Blog - Categories
@endsection


@section('styles')

@endsection


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Categories</h1>


    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">Categoreis</h6>
            <a href="{{route(('categories.create'))}}" class="float-right btn btn-success" >Add Category</a>
        </div>
        <div class="card-body">
            The styling for this basic card example is created by using default Bootstrap
            utility classes. By using utility classes, the style of the card component can be
            easily modified with no need for any custom CSS!
        </div>

        <div class=" card-body">
            <table class="table table-striped table-bordered w-100" id="categories">
                <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>

                </tr>
                </thead>
                <tbody>
                @foreach($category as $cat)
                <tr>
                    <th scope="col">{{ $cat->name }}</th>
                    <th scope="col">{{ $cat->created_at }}</th>
                    <th scope="col">{{ $cat->updated_at }}</th>
                    <th>
                    <a href="{{ route('categories.edit',$cat->id) }}">Edit</a>
                        <a href="{{ route('categories.destroy',$cat->id) }}" onclick="return confirm('Are you sur')">Delete</a>

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
