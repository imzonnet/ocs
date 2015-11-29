@extends('Dashboard::backend.default.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.ocs.order.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Code</th>
                                <th>Customer</th>
                                <th>Created Date</th>
                                <th>Process Date</th>
                                <th>Finish Date</th>
                                <th>Manager</th>
                                <th class="center">Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr class="odd gradeX">
                                    <th>{{$order->id}}</th>
                                    <td>{{$order->order_code}}</td>
                                    <td>{{$order->customer->present()->fullName}}</td>
                                    <td>{{$order->created_date}}</td>
                                    <td>{{$order->process_date}}</td>
                                    <td>{{$order->finish_date}}</td>
                                    <td>{{$order->manager->present()->fullName}}</td>
                                    <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.ocs.order.destroy', $order->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                        <div class="btn-order" role="order" aria-label="...">
                                            <a href="{{route('backend.ocs.order.edit',[$order->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
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
