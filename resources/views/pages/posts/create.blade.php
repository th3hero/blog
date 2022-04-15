@extends('template.master')

@section('title', 'Create Post');

@section('custom-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

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
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Create Post</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Enter Title of the Post <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Enter a title for the post">
                            <div class="form-text" id="titleHelp">Title of the Post is required.</div>
                        </div>
                        <div class="mb-3">
                            <label for="tag" class="form-label">Select Tags for the post. <span class="text-danger">*</span></label>
                            <select name="tags[]" multiple id="tag" class="form-select">
                                @forelse($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                @empty
                                @endforelse
                            </select>
                            <div class="form-text" id="shortHelp">short description is required.</div>
                        </div>
                        <div class="mb-3">
                            <label for="PostBox" class="form-label">Write Your Post Below <span class="text-danger">*</span></label>
                            <textarea name="description" id="PostBox" cols="30" rows="10" placeholder="Kindly Write your Post Here.">{{ old('description') }}</textarea>
                            <div class="form-text" id="shortHelp">Post Body is required.</div>
                        </div>
                        <div class="mb-3">
                            <label for="input-file-now" class="form-label">Upload Images <span class="text-danger">*</span></label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="input-file-now" accept="image/jpeg, image/bmp, image/png, image/jpg, image/svg" class="file-upload" name="image" />
                            </div>
                            <div class="form-text" id="shortHelp">Image is required.</div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('root.page') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#PostBox')).then( editor => {
            editor.ui.view.editable.element.style.height = '400px';
        });
        $(document).ready(function() {
            $('.form-select').select2();
        });
    </script>
@endsection
