@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All User Information</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="{{url('dashboard/user/add')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add User</a>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable custom_table" id="alltableinfo">
			<thead class="thead-dark">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Role</th>
					<th>Photo</th>
					<th>Manage</th>
				</tr>
			</thead>
			<tbody>
        @foreach($all as $data)
				<tr>
					<td>{{$data->name}}</td>
					<td>{{$data->email}}</td>
					<td>{{ $data->phone ? :'--' }}</td>
					<td>{{ $data->role }}</td>
					<td>
                        @if ($data->image != '')
                        <img class="img50" src="{{ URL::to($data->image) }}" alt="No-image"/>
                        @else
                        <img class="img50" src="{{asset('uploads/avatar.png')}}" alt="No-image"/>
                        @endif
          </td>
					<td>

                        <a href="{{ route('user.view',$data->id) }}" class="text-dark" title="view"><i class="fa fa-plus-square fa-2x"></i></a>
                        <a href="{{ route('user.view',$data->id) }}" class="text-info" title="View"><i class="fa fa-pen-square fa-2x"></i></a>
                        <a href="{{ route('user.softdelete',$data->id) }}" class="text-danger" title="delete"><i class="fa fa-trash fa-2x"></i></a>

                    </td>
				</tr>
        @endforeach
			</tbody>
		</table>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>
@endsection
