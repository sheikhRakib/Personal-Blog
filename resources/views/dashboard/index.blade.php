@extends('dashboard.app')

@section('content')
<div class="content-header">
    <div class="container">
        {{ Breadcrumbs::render('index') }}
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <x-dashboard.box title='Posts' :count='$postCount' background='bg-info' icon='fa-pen-square'/>
            <x-dashboard.box title='Categories' :count='$categoryCount' background='bg-success' icon='fa-box'/>
            <x-dashboard.box title='Tags' :count='$tagCount' background='bg-warning' icon='fa-tag'/>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Post List</h3>
                            <a href="{{ route('dashboard.post.index') }}" class="btn btn-primary">Post List</a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Created Date</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                    <tr>
                                        <td>
                                            <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            @forelse($post->tags as $tag)
                                                <span class="badge badge-primary">{{ $tag->name }} </span>
                                            @empty
                                            <span>-</span>
                                            @endforelse
                                        </td>
                                        <td>{{ $post->created_at->format('d M, Y') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('dashboard.post.show', [$post->slug]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <a href="{{ route('dashboard.post.edit', [$post->slug]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="{{ route('dashboard.post.destroy', [$post->slug]) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No posts found.</h5>
                                        </td>
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
