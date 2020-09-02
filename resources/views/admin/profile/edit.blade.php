@extends('layouts.admin')


@section('title',' shipping Edit')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.dashboard')}}">{{__('admin/shipping.Home')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/profile.EditProfileAdmin')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"
                                        id="basic-layout-form"> {{__('admin/profile.EditProfileAdmin')}} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="post"
                                              action="{{route('admin.update.profile')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$admin->id}}" >
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-body">
                                                        <h4 class="form-section"><i class="ft-user"></i> {{__('admin/profile.Personal Info')}} </h4>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="name">{{__('admin/profile.First Name')}}</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="name" value="{{$admin->name}}" class="form-control"
                                                                       name="name">
                                                                @error('name')
                                                                <span class="text-danger"> {{$message}}  </span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="email">{{__('admin/profile.E-mail')}}</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="email" class="form-control" value="{{$admin->email}}"  name="email">
                                                                @error('email')
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="password">{{__('admin/profile.Password')}}</label>
                                                            <div class="col-md-9">
                                                                <input type="password" id="projectinput4" class="form-control" placeholder="{{__('admin/profile.Password')}}" name="password">
                                                                @error('password')
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="password_confirmation">{{__('admin/profile.PasswordConfirm')}}</label>
                                                            <div class="col-md-9">
                                                                <input type="password" id="password_confirmation" class="form-control" placeholder="{{__('admin/profile.PasswordConfirm')}}" name="password_confirmation">
                                                                @error('password_confirmation')
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  name="photo">{{__('admin/profile.Image')}}</label>
                                                            <div class="col-md-9">
                                                                <label id="photo" class="file center-block">
                                                                    <input type="file" id="file" name="photo">
                                                                    <span class="file-custom"></span>
                                                                </label>
                                                                @error('photo')
                                                                <span class="text-danger">{{$message}} </span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card ">
                                                            <div class="text-center">
                                                                <div class="card-body ">
                                                                    <img src="{{$admin->image}}" class="rounded-circle  height-150"
                                                                         alt="Card image">
                                                                </div>
                                                                <div class="card-body">
                                                                    <h4 class="card-title">{{$admin->name}}</h4>
                                                                    <h6 class="card-subtitle text-muted">{{$admin->email}}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/profile.Save')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection


