@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 70px;">
    <h2 style="text-align: center;">Books list</h2>
    <div class="input-group input-group-sm col-sm-3">
        <input type="text" id="bookData" class="form-control" placeholder="Search book">
        <span class="input-group-btn">
            <button id="searchData" url="/helpers/getBooks" href="#" data-toggle="modal" type="button" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
        </span>
    </div>
    <br>
    <button type="button" class="btn btn-success pull-left" onclick="window.location='{{ url("books/create") }}'">Add book</button>
    <div id="principalPanel">
        @section('contentPanel')
        <!-- Solo se recarga esta parte, por eso va dentro este include, sino no desaparece-->
        @include('books.booksTable')
        @show
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $('#searchData').click(function () {
        var url = $(this).attr("url");
        var name = $("#bookData").val();
        $.ajax({
            url: url,

            data: { 'bookData': name },
            type: 'GET',
            dataType: 'json',
            success: function (respuesta) {
                $('#principalPanel').empty().append($(respuesta));
            },
            error: function (respuesta) {
                var errors = respuesta.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
                alert('Not found');
            },
        });
    });
});
</script>
@endsection





