@extends('layouts.master')
@section('title','Quiz 3 - Edit Artikel')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary float-left">Edit Artikel</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="/artikel/{{$article->id}}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                    <input type="text" value="{{$article->title}}" name="title" class="form-control" id="staticEmail" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                    <textarea name="content" class="form-control" cols="30" rows="10">{{$article->content}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-10">
                    <input type="text" name="tags" value="{{implode(",",$resultstr)}}" class="form-control" id="staticEmail" placeholder="Example : Tag1, Tag2, Tag3, .....">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{url('/artikel')}}" class="btn btn-warning">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection