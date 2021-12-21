@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dialogueVideos.list')}}">影视内容管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">编辑影视内容</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">编辑影视内容</h6>
                    <form action="{{route('dialogueVideos.update',[$video->id])}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        @include('pages.dialogue_videos.partials.form')
                        <button class="btn btn-primary" type="submit">更新内容</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
