@extends('theme.default')

@section('heading')
Add a new book
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-">
            Add a new book
                </div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">The title of the book</label>

                    <div class="col-md-6 offset-md-2">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="isbn" class="col-md-4 col-form-label text-md-right">Serial Number</label>

                    <div class="col-md-6 offset-md-2">
                        <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}" autocomplete="isbn">

                        @error('isbn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-right">Cover image</label>

                    <div class="col-md-6 offset-md-2">
                        <input id="cover_image" accept="image/*" type="file" onchange="readCoverImage(this);" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}" autocomplete="cover_image">

                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="cover-image-thumb" class="img-fluid img-thumbnail" src="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                    <div class="col-md-6 offset-md-2">
                        <select id="category" class="form-control" name="category">
                            <option disabled selected>Choose a category</option>
                            @foreach($categories as $categry)
                                <option value="{{ $categry->id }}">{{ $categry->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="authors" class="col-md-4 col-form-label text-md-right">Authors</label>

                    <div class="col-md-6 offset-md-2">
                        <select id="authors" multiple class="form-control" name="authors[]">
                            <option disabled selected> Choose Author </option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('authors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="publisher" class="col-md-4 col-form-label text-md-right">publisher</label>

                    <div class="col-md-6 offset-md-2">
                        <select id="publisher" class="form-control" name="publisher">
                            <option disabled selected>Choose publisher</option>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                        @error('publisher')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">The description</label>

                    <div class="col-md-6 offset-md-2">
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="publish_year" class="col-md-4 col-form-label text-md-right">Publisher year </label>

                    <div class="col-md-6 offset-md-2">
                        <input id="publish_year" type="number" class="form-control @error('publish_year') is-invalid @enderror" name="publish_year" value="{{ old('publish_year') }}" autocomplete="publish_year">

                        @error('publish_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number_of_pages" class="col-md-4 col-form-label text-md-right"> Number of pages</label>

                    <div class="col-md-6 offset-md-2">
                        <input id="number_of_pages" type="number" class="form-control @error('number_of_pages') is-invalid @enderror" name="number_of_pages" value="{{ old('number_of_pages') }}" autocomplete="number_of_pages">

                        @error('number_of_pages')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="number_of_copies" class="col-md-4 col-form-label text-md-right"> Number of copies</label>

                    <div class="col-md-6 offset-md-2">
                        <input id="number_of_copies" type="number" class="form-control @error('number_of_copies') is-invalid @enderror" name="number_of_copies" value="{{ old('number_of_copies') }}" autocomplete="number_of_copies">

                        @error('number_of_copies')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                    <div class="col-md-6 offset-md-2">
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-1 offset-md-2">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#cover-image-thumb')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection