@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/subCategories/edit.home')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.subCategories')}}"> {{__('admin/subCategories/edit.categories')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/subCategories/edit.edit')}} {{$category->name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/subCategories/edit.edit sub category')}} </h4>
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
                                        <form class="form" action="{{route('admin.update.subCategories',$category->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{$category->id}}" name="id">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img src="{{$category->image}}" class="img-thumbnail height-150"

                                                         alt="{{$category->name}}">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="avatar" class="col-form-label">{{__('admin/subCategories/edit.category image')}} </label>
                                                <input type="file" name="avatar" class="form-control"
                                                       value="">

                                                @error('avatar')
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>


                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/subCategories/edit.category data')}} </h4>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput2"> {{__('admin/subCategories/edit.choose category')}} </label>
                                                            <select name="parent_id" class="select2 form-control">
                                                                <optgroup
                                                                    label="{{__('admin/subCategories/edit.choose category')}} ">
                                                                    @isset($categories)
                                                                        @foreach($categories as $cat)
                                                                            <option
                                                                                value="{{$cat->id}}"
                                                                                @if($cat->id == $category->parent_id) selected @endif>{{$cat->name}}</option>
                                                                        @endforeach
                                                                    @endisset
                                                                </optgroup>
                                                            </select>
                                                            @error('parent_id')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> {{__('admin/subCategories/edit.category name')}}
                                                               </label>
                                                            <input type="text" value="{{$category->name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder=""

                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="slug"> {{__('admin/subCategories/edit.slug')}}
                                                            </label>
                                                            <input type="text" value="{{$category->slug}}" id="name"
                                                                   class="form-control"
                                                                   placeholder=""

                                                                   name="slug">
                                                            @error("slug")
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
                                                                   @if($category->is_active == '1')  checked @endif />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1"> {{__('admin/subCategories/edit.status')}}</label>
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
                                                    <i class="ft-x"></i>  {{__('admin/subCategories/edit.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/subCategories/edit.update')}}
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


