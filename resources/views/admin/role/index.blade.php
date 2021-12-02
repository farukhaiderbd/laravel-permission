@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
			<h3 class="kt-portlet__head-title">All Role</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="{{route('role.add')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>Add Role</a>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-checkable custom_table" id="alltableinfo">
                        <thead class="thead-dark">
                            <tr>
                                <th>id</th>
                                <th>Role Name</th>
                                <th width="5" >Permission</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i= 1;
                            @endphp
                            @foreach($roles as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$data->name}}</td>
                                <td>
                                    <a  href="{{ route('role.edit',$data->id) }}"><i class="fa fa-list ml-3 font-22"></i></a>
                                    <a  href="{{ route('role.delete',$data->id) }}"><i class="fa fa-trash ml-3 font-22 text-danger"></i></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
  <div class="kt-portlet__foot">
    ...
	</div>
</div>

<!--delete modal code start-->
<div class="modal fade" id="softDelModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
				<form method="post" action="">
					@csrf

	        <div class="modal-content">
	            <div class="modal-header alert_modal_header">
	                <h5 class="modal-title"><i class="fab fa-gg-circle"></i> Confirm Message</h5>
	            </div>
	            <div class="modal-body alert_modal_body">
									Are you sure you want to delete?
									<input type="hidden" id="modal_id" name="modal_id">
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
									<button type="button" class="btn btn-sm btn-brand" data-dismiss="modal">Close</button>
	            </div>
	        </div>
				</form>
    </div>
</div>

@endsection
