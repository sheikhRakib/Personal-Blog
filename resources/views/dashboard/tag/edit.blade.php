@extends('dashboard.app')

@section('content')
<div class="content-header">
    <div class="container">
        {{ Breadcrumbs::render('tag.edit', $tag) }}
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit Tag - {{ $tag->name }}</h3>
                            <a href="{{ route('dashboard.tag.index') }}" class="btn btn-primary">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                &nbsp;
                                <span>Back</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route('dashboard.tag.update', [$tag->slug]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        @include('includes.errors')
                                        <div class="form-group">
                                            <label for="name">Tag name</label>
                                            <input type="name" name="name" class="form-control"
                                                value="{{ $tag->name }}" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter description"> {{ $tag->description }} </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-primary">Update Tag</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
