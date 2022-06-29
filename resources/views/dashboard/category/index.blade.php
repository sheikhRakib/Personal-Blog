@extends('dashboard.app')

@section('content')
<div class="content-header">
    <div class="container">
        {{ Breadcrumbs::render('category.index') }}
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Category List</h3>
                            <a href="{{ route('dashboard.category.create') }}" class="btn btn-primary">Create Category</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>0</td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.category.show', [$category->slug]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <a href="{{ route('dashboard.category.edit', [$category->slug]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="{{ route('dashboard.category.destroy', [$category->slug]) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <h5 class="text-center">No Data found.</h5>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        {{ $categories->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
