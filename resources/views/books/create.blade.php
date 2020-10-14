@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-8">
            <div class="panel-body">
                {!! Form::open(['action' => ['BookController@store'],'method' => 'POST']) !!}

                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', '', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('author', 'Author')}}
                    {!! Form::select('author_id', $authors, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {{Form::label('category', 'category')}}
                    <select class="category_id form-control" name="category_id"></select>
                </div>
                <div class="form-group">
                    {{Form::label('published_date', 'Published date')}}
                    {{Form::date('published_date', '', ['class' => 'form-control'])}}
                </div>

                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm"></div>
    </div>
</div>

<script type="text/javascript">
    $('.category_id').select2({
        placeholder: 'Select a category',
        ajax: {
            url: '{{route('helpers.search')}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id,
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endsection


