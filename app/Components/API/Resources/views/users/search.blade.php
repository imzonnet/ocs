@if(count($users) > 0)
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>State</th>
        <th class="center">Task</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr class="odd gradeX">
        <th>{{$user->id}}</th>
        <td>{{$user->full_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->address}}</td>
        <td>{{user_state($user->activated)}}</td>
        <td class="center" style="min-width: 100px;">
            <div class="btn-group" role="group" aria-label="...">
                <a href="#." class="btn btn-success btn-sm" title="Edit"><i class="fa fa-plus"></i> Add Order</a>
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{!! $users->setPath('')->render() !!}
</div>
@else
    <h3>Not found any customer.</h3>
    <p><a href="{{ route('backend.user.create') }}" class="btn btn-info">Add New Customer</a></p>
@endif