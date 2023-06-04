@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
View books
@endsection

@section('content')
<a class="btn btn-primary" href="{{ route('books.create') }}"><i class="fas fa-plus"></i> Add a new book </a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-striped table-bordered text-left" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>The title of the book</th>
                    <th>Serial Number</th>
                    <th>Category</th>
                    <th>Authors</th>
                    <th>publisher</th>
                    <th>price</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->category != null ? $book->category->name : '' }}</td>
                        <td>
                            @if($book->authors()->count() > 0)
                                @foreach($book->authors as $author)
                                    {{ $loop->first ? '' : 'and' }}
                                    {{ $author->name }}
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $book->publisher != null ? $book->publisher->name : '' }}</td>
                        <td>{{ $book->price }}$</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('books.edit', $book) }}"><i class="fa fa-edit"></i>Edit</a> 
                            <form method="POST" action="{{ route('books.destroy', $book) }}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i>Delete </button> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#books-table').DataTable({
           // "language": {
              //  "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
          //  } هذا من شان اذا نريده باللغة العربية
        });
    });
</script>
@endsection
