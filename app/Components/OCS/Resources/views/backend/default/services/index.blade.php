@extends('Dashboard::backend.default.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.ocs.service.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th class="center">Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr class="odd gradeX">
                                    <th>{{$service->id}}</th>
                                    <td>{{$service->title}}</td>
                                    <td class="center" style="min-width: 100px;">
                                            {!! Form::open(['route' => ['backend.ocs.service.destroy', $service->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                        <div class="btn-service" role="service" aria-label="...">
                                            <a href="{{route('backend.ocs.service.edit',[$service->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </div>
                                            {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop
