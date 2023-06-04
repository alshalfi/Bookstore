@extends('theme.default')

@section('heading')
View book details
@endsection

@section('head')
    <style>
        table {
            table-layout: fixed;
        }
        table tr th {
            width: 30%;
        }
        .img-thumbnail img {
            max-width: 100%;
            max-height: 100%;
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View book details</div>

                <div class="card-body">
                    <table class="table table-stribed">
                        <tr>
                            <th>title</th>
                            <td class="lead"><b>{{ $book->title }}</b></td>
                        </tr>

                        @if ($book->isbn)
                            <tr>
                                <th> Serial Number</th>
                                <td>{{ $book->isbn }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Cover image </th>
                            <td><img class="img-thumbnail" src="{{ asset('storage/' . $book->cover_image) }}"></td>
                        </tr>
                        @if ($book->category)
                            <tr>
                                <th>Category</th>
                                <td>{{ $book->category->name }}</td>
                            </tr>
                        @endif
                        @if ($book->authors()->count() > 0)
                            <tr>
                                <th>Authors</th>
                                <td>
                                    @foreach ($book->authors as $author)
                                        {{ $loop->first ? '' : 'و' }}
                                        {{ $author->name }}
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        @if ($book->publisher)
                            <tr>
                                <th>publisher</th>
                                <td>{{ $book->publisher->name }}</td>
                            </tr>
                        @endif
                        @if ($book->description)
                            <tr>
                                <th>The description</th>
                                <td>{{ $book->description }}</td>
                            </tr>
                        @endif
                        @if ($book->publish_year)
                            <tr>
                                <th>Publisher year </th>
                                <td>{{ $book->publish_year }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Number of pages </th>
                            <td>{{ $book->number_of_pages }}</td>
                        </tr>
                        <tr>
                            <th>Number of copies </th>
                            <td>{{ $book->number_of_copies }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $book->price }} $</td>
                        </tr>
                    </table>
                    <a class="btn btn-info btn-sm" href="{{ route('books.edit', $book) }}"><i class="fa fa-edit"></i> edit</a>
                    <form method="POST" action="{{ route('books.destroy', $book) }}" class="d-inline-block">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
