@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/brands/edit.home')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.mainCategories')}}"> {{__('admin/brands/edit.brands')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/brands/edit.edit')}} - {{$brand->name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/brands/edit.edit brand')}} </h4>
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
                                        <form class="form" action="{{route('admin.update.brands',$brand->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{$brand->id}}" name="id">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img src="{{$brand->photo}}" class="img-thumbnail height-150"

                                                         alt="{{$brand->name}}">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="avatar" class="col-form-label">{{__('admin/brands/edit.brand image')}} </label>
                                                <input type="file" name="avatar" class="form-control"
                                                       value="">

                                                @error('avatar')
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>


                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/brands/edit.brand data')}} </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> {{__('admin/brands/edit.brand name')}}
                                                               </label>
                                                            <input type="text" value="{{$brand->name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" name="is_active"
                                                                   id="switcheryColor4"
                                                                   value="1"
                                                                   class="switchery" data-color="success"
                                                                   @if($brand->is_active == '1')  checked @endif />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1"> {{__('admin/brands/edit.status')}}</label>
                                                            @error("is_active")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>  {{__('admin/brands/edit.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/brands/edit.update')}}
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


