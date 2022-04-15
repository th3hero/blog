@extends('template.master')

@section('title', 'Posts Listing');

@section('content')
    <div class="container d-flex justify-content-center">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <section class="pt-0 pb-0">
        <div class="container justify-content-center">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">List Of Posts by you</h3>
                    <a href="{{ route('blog.create') }}" class="btn btn-secondary">Add Post</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $key=>$post)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->publish ? 'Published' : 'Unpublished' }}</td>
                                    <td><a class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form{{$key}}').submit();">Delete</a><form id="delete-form{{$key}}" method="post" action="{{ route('tags.destroy', Crypt::encrypt($post['id'])) }}" class="d-none">@csrf {{ method_field('DELETE') }}</form></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Records Available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
