@section('contentPanel')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Category</th>
                <th>Published date</th>
                <th>Borrowed to</th>
                <th>Available</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->category->name}}</td>
                <td>{{ $book->published_date }}</td>
                <td>{{ $book->user}}</td>
                <td>{{ $book->status ? 'Y' : 'N' }}</td>
                <td>
                    <div class='btn-group'>
                        {!! Form::open(['action' => ['BookController@destroy', $book->id], 'method' => 'DELETE']) !!}
                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn-danger btn-sm', 'onclick' => "return confirm('Do you want to delete the record?')"]) !!}
                        {!! Form::close() !!}
                        @include('partials.modal')
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal{{$book->id, $book->author->name}}"><i class="fa fa-pencil"></i></button>
                    </div>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$books->links()}}
</div>
@endsection
