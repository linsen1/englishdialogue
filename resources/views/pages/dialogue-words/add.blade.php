@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dialogueWords.list')}}">图文内容管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">添加图文内容</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">添加图文</h6>
                    <form action="{{route('dialogueWords.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('pages.dialogue-words.partials.form')
                        <button class="btn btn-primary" type="submit">确认添加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
