<div class="modal" id="updateModal{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-8">
                    <div class="panel-body">
                        {!! Form::open(['action' => ['BookController@update', $book->id],'method' => 'PATCH']) !!}

                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', $book->name, ['class' => 'form-control','readonly'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('name', 'Autor')}}
                            {{Form::text('name', $book->author->name, ['class' => 'form-control','readonly'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Category')}}
                            {{Form::text('name', $book->category->name, ['class' => 'form-control','readonly'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('published_date', 'Published date')}}
                            {{Form::date('published_date',$book->published_date , ['class' => 'form-control','readonly'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('user', 'Lend book to')}}
                            {{Form::text('user', $book->user, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            @if($book->status==0)
                            {!! Form::checkbox('status',null,true) !!}
                            @else
                            {!! Form::checkbox('status',null,false) !!}
                            @endif
                            {!! Form::label('status', 'Disable') !!}
                        </div>
                        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-sm"></div>
            </div>
        </div>
      </div>
    </div>
</div>
