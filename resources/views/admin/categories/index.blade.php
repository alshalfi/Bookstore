@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Show category
@endsection

@section('content')
<a class="btn btn-primary" href="{{ route('categories.create') }}"><i class="fas fa-plus"></i> Add a new category</a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-striped table-bordered text-left" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>The name</th>
                    <th>The description</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category) }}"><i class="fa fa-edit"></i> Edit</a> 
                            <form method="POST" action="{{ route('categories.destroy', $category) }}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> delete</button> 
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
          //  "language": {
            //    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            //}
        });
    });
</script>
@endsection