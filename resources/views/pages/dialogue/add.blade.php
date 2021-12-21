@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dialogue.list')}}">目录管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">添加目录</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">添加目录</h6>
                    <form action="{{route('dialogue.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('pages.dialogue.partials.form')
                        <button class="btn btn-primary" type="submit">确认添加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
