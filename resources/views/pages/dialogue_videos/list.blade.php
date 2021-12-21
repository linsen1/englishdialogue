@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dialogueVideos.list')}}">影视内容管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">影视列表</li>
        </ol>
    </nav>
    @if(session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('status')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">专题列表</h6>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTableExample" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>影视封面</th>
                                <th>所属目录</th>
                                <th>添加时间</th>
                                <th>编辑</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dialogueVideosList as $video)
                                <tr>
                                    <th>{{$video->id}}</th>
                                    <td>
                                       <image src="{{env('tencent_url_default').$video->video_image}}" width="50px"/>
                                    </td>
                                    <td>{{show_dialogue_title($video->dialogue_base_id)}}</td>
                                    <td>{{$video->updated_at}}</td>
                                    <td> <a href="{{route('dialogueVideos.edit',[$video->id])}}">编辑</a>&nbsp;&nbsp;</td>

                                    <td>  <form action="{{route('dialogueVideos.destroy',[$video->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-primary btn-sm" type="submit">删除</button>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush