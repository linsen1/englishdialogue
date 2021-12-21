@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('classBases.list')}}">专题分类管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">专题列表</li>
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
                        <table class="table table-hover" id="dataTableExample">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>分类名称</th>
                                <th>权重</th>
                                <th>类型</th>
                                <th>编辑</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classBases as $classBase)
                            <tr>
                                <th>{{$classBase->id}}</th>
                                <td>{{$classBase->class_name}}</td>
                                <td>{{$classBase->class_order}}</td>
                                @if ($classBase->class_type ===0)
                                <td>口语对话</td>
                                @elseif($classBase->class_type ===1)
                                    <td>美文</td>
                                @endif
                                <td> <a href="{{route('classBases.edit',['classBase'=>$classBase->id])}}">编辑</a>&nbsp;&nbsp;</td>

                                <td>  <form action="{{route('classBases.destroy',['classBase'=>$classBase->id])}}" method="post">
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