@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dialogueVideos.list')}}">影视内容管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">添加影视内容</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">添加影视</h6>
                    <form action="{{route('dialogueVideos.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('pages.dialogue_videos.partials.form')
                        <button class="btn btn-primary" type="submit">确认添加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
