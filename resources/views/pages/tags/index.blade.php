@extends('template.master')

@section('title', 'Tags Management');

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
                    <h3 class="card-title">List Of Tags</h3>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#AddTag">Add Tag</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tag Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tags as $key=>$tag)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $tag->tag_name }}</td>
                                    <td><a class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form{{$key}}').submit();">Delete</a><form id="delete-form{{$key}}" method="post" action="{{ route('tags.destroy', Crypt::encrypt($tag['id'])) }}" class="d-none">@csrf {{ method_field('DELETE') }}</form></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No Records Available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="AddTag" tabindex="-1" aria-labelledby="AddTag" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('tags.store') }}" method="post">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalTitle">Add Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="TagName" class="form-label">Enter Tag Name</label>
                            <input type="text" name="tag_name" id="TagName" class="form-control" placeholder="Enter tag name to create" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
