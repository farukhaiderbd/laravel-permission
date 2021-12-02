@extends('layouts.admin')
@section('title', 'Role Permission')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
   .nav-item .active{

        border-left: 2px solid rgb(32, 32, 226);
    }
</style>
<link rel="stylesheet" href="{{ asset('contents/admin/assets/plugins/custom/prismjs/switchery.min.css') }}">

<script src="{{ asset('contents/admin/assets/plugins/custom/prismjs/switchery.min.js') }}"></script>
@endpush
@section('content')
<div class="kt-portlet__body">
    <div class="row mt-2">
        <div class="col-xl-12">
            <div class="tabs-vertical-env row">
                <ul class="nav nav-tabs flex-column nav tabs-vertical col-md-3" role="tablist">
                    <li class=""> <a class="nav-link disabled " aria-disabled="true" style="border:1px solid rgb(190, 187, 187)" >Role Information</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link show active" id="v-social-tab" data-toggle="tab" href="#v-social" role="tab" aria-controls="v-social" aria-selected="false">Genarel</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link show " id="v-group-tab" data-toggle="tab" href="#v-group" role="tab" aria-controls="v-group" aria-selected="true"> Permission Group</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link show " id="v-contact-tab" data-toggle="tab" href="#v-contact" role="tab" aria-controls="v-contact" aria-selected="true">Permission</a>
                    </li>

                </ul>

                <div class="tab-content col-md-9">
                    <div class="tab-pane show active" id="v-social" role="tabpanel" aria-labelledby="v-social-tab">
                        <form action="{{ route('role.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group row">
                            <label for="my-input" class="col-md-3"></label>
                            <label for="my-input" class="col-md-2">Name</label>
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <input id="my-input" class="form-control col-md-4" type="text" name="name" value="{{ $role->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary"  style="margin-left: 450px">Update</button>
                        </form>
                    </div>

                    <div class="tab-pane show" id="v-group" role="tabpanel" aria-labelledby="v-group-tab">
                        <form action="{{ route('role.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group row">
                            <label for="my-input" class="col-md-3"></label>
                            <label for="my-input" class="col-md-2">Name</label>
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <input id="my-input" class="form-control col-md-4" type="text" name="name" value="{{ $role->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary"  style="margin-left: 450px">Update</button>
                        </form>
                    </div>
                    <div class="tab-pane show " id="v-contact" role="tabpanel" aria-labelledby="v-contact-tab">
                        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Permission</h3>
                                        </div>
                                        <div class="col-md-4 text-right">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="card-body card_form">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success alertsuccess" role="alert">
                                            <strong>Successfully!</strong> update contact information.
                                            </div>
                                        @endif
                                        @if(Session::has('error'))
                                            <div class="alert alert-warning alerterror" role="alert">
                                            <strong>Opps!</strong> please try again.
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-1" style="padding: 0px 5px">All</div>
                                    <div class="col-md-1" style="padding: 0px 5px">Create</div>
                                    <div class="col-md-1" style="padding: 0px 5px">Edit</div>
                                    <div class="col-md-1"  style="padding: 0px 5px">View</div>
                                    <div class="col-md-1"  style="padding: 0px 5px">Delete</div>
                                </div>
                                <br>
                                <hr>
                                <hr>
                                </div>
                                <div class="card-footer card_footer_button text-center">
                                    <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>

    </div>
</div>

@endsection
@push('js')

<script>
    $(document).ready(function(){

        $('input[name="permission"]').on('change',function(){

            var check = $(this).prop('checked');
                var id = $(this).data('id');
                var permission = $(this).data('permission');
                    $.ajaxSetup({
                    headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    url: '{{ route('permission.update') }}',
                    method: "POST",
                    data:{id:id, permission:permission, check:check},
                    success: function(data){

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                            getValues()
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: data.error
                            })
                        }
                        }
                })


        })
    })
</script>

@endpush




