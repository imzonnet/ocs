@extends('Dashboard::backend.default.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.country.town.create', $country->id)}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th class="center">Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($towns as $town)
                                <tr class="odd gradeX">
                                    <th>{{$town->id}}</th>
                                    <td>{{$town->name}}</td>
                                    <td>{{$town->country->first()->name}}</td>
                                    <td class="center" style="min-width: 100px;">
                                            {!! Form::open(['route' => ['backend.country.town.destroy', $town->country_id, $town->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                        <div class="btn-town" role="town" aria-label="...">
                                            <a href="{{route('backend.country.town.edit',[$town->country_id, $town->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('backend.town.district.index',[$town->id])}}" class="btn btn-info btn-sm" title="List Districts">{{ trans('Dashboard::cms.district.list') }}</a>
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
