@extends('layouts.admin')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        @if (Session::has('success'))
            <script type="text/javascript">
                swal({
                    title: "Success!",
                    text: "Updated Successfully.",
                    icon: "success",
                    button: "OK",
                    timer: 5000,
                });

            </script>
        @endif
        @if (Session::has('error'))
            <script type="text/javascript">
                swal({
                    title: "Opps!",
                    text: "Error! Please try again",
                    icon: "error",
                    button: "OK",
                    timer: 5000,
                });

            </script>
    @endif

    <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                                id="kt_subheader_mobile_toggle"><span></span></button>
                        Profile </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <!--End:: App Aside Mobile Toggle-->

                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                    <!--begin:: Widgets/Applications/User/Profile1-->
                    <div class="kt-portlet kt-portlet--height-fluid-">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        @if ($user->image == '')
                                            <img src="{{ asset('uploads/avatar.png')}}" alt="No-image"/>
                                        @else
                                            <img src="{{asset($user->image)}}" alt="image"/>
                                        @endif
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                {{$user->name}}
                                                <i class="flaticon2-correct kt-font-success"></i>
                                            </a>
                                            {{-- <span class="kt-widget__subtitle">
                                                {{$user->department_details->name}}
                                            </span> --}}
                                        </div>

                                        <div class="kt-widget__action">
                                            <button type="button" class="btn btn-info btn-sm">Active</button>&nbsp;
                                            {{-- <button type="button" class="btn btn-success btn-sm">follow</button> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Email:</span>
                                            <a href="#" class="kt-widget__data">{{$user->email}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Phone:</span>
                                            <a href="#" class="kt-widget__data">{{$user->phone}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Location:</span>
                                            {{-- <span class="kt-widget__data">{{$user->present_address}}</span> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
                    <!--end:: Widgets/Applications/User/Profile1-->
                </div>

                <!--Begin:: App Content-->
                <div class="col-xl-8">
                    <!--begin:: Widgets/Order Statistics-->
                    <div class="kt-portlet ">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Personal Information
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget12">
                                <form action="{{ route('user.info.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row custom_row{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">User Name:</label>
                                        <div class="col-md-7">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="text" class="form-control" name="name" value="{{old('name') ?? $user->name ?? ''}}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row custom_row{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">User E-mail:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="email" value="{{old('email') ?? $user->email ?? ''}}">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row custom_row{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">User Phone:</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $user->phone ?? ''}}">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row custom_row{{ $errors->has('role') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">User Role:</label>
                                        <div class="col-md-7">
                                            @php
                                                $roles = \App\Models\Role::all();
                                            @endphp
                                            <input type="text" class="form-control" disabled name="phone" value="Admin">

                                        </div>
                                    </div>

                                    <div class="kt-portlet__foot text-center">
                                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Order Statistics-->
                    <!--begin:: Widgets/Order Statistics-->
                    <div class="kt-portlet ">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Password Change
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget12">
                                <form action="{{ route('user.passupdate') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row custom_row{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">Old Password:</label>
                                        <div class="col-md-7">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="password" class="form-control" name="old_password" >
                                            @if ($errors->has('old_password'))
                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('old_password') }}</strong>
                                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row custom_row{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">New Password:</label>
                                        <div class="col-md-7">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="password" class="form-control" name="password" >
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row custom_row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-form-label">Confirm Password:</label>
                                        <div class="col-md-7">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="password" class="form-control" name="password_confirmation" >
                                            @if ($errors->has('password_confirmation'))
                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="kt-portlet__foot text-center">
                                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Order Statistics-->
                    <div class="kt-portlet ">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Profile Picture Change
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                            <div class="kt-widget12">
                                <form action="{{ route('user.image.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row custom_row">
                                        <label class="col-md-3 col-form-label">Upload Photo:</label>
                                        <div class="col-md-7">
                                            <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                                @if ($user->image == '')
                                                    <div class="kt-avatar__holder" style="background-image: url({{asset('uploads/avatar.png')}})"></div>
                                                @else
                                                    <div class="kt-avatar__holder" style="background-image: url({{asset($user->image)}})"></div>
                                                @endif
                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen"></i>
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="old_image" value="{{ $user->image }}">
                                                </label>
                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                                            <i class="fa fa-times"></i>
                                                                    </span>
                                            </div>
                                            <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot text-center">
                                        <button type="submit" class="btn btn-md btn-brand">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--End::App-->
        </div>
        <!-- end:: Content -->
    </div>
@endsection
@push('js')
    <script>
        $("#month_only").datepicker( {
            format: "mm",
            viewMode: "months",
            minViewMode: "months"
        });
        $("#year_only").datepicker( {
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
@endpush
