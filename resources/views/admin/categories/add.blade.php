@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.dashboard')}}">{{__('admin/categories/add.home')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.mainCategories')}}"> {{__('admin/categories/add.categories')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/categories/add.add category')}}
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
                                        id="basic-layout-form"> {{__('admin/categories/add.add category')}} </h4>
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
                                        <form class="form" action="{{route('admin.store.mainCategory')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="avatar"
                                                       class="col-form-label">{{__('admin/categories/edit.category image')}} </label>
                                                <input type="file" name="avatar" class="form-control"
                                                       value="{{old('avatar')}}">
                                                @error('avatar')
                                                <span class="text-danger">{{$message}} </span>
                                                @enderror
                                            </div>


                                            <div class="form-body">
                                                <h4 class="form-section"><i
                                                        class="ft-home"></i>{{__('admin/categories/edit.category data')}}
                                                </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="name"> {{__('admin/categories/edit.category name')}}
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   value="{{old('name')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="slug"> {{__('admin/categories/edit.slug')}}
                                                            </label>
                                                            <input type="text" value="{{old('slug')}}" id="slug"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   name="slug">
                                                            @error("slug")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row hidden" id="cat_list">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h6>{{__('admin/categories/add.choose main category')}}</h6>
                                                            <select class="selectBox form-control" name="parent_id">
                                                                @isset($categories)
                                                                    @foreach($categories as $cat)
                                                                        <option
                                                                            value="{{$cat->id}}">{{$cat->name}}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('parent_id')
                                                    <span class="text-danger">{{$message}} </span>
                                                    @enderror
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" name="is_active"
                                                                   id="switcheryColor4"
                                                                   value="1"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1"> {{__('admin/categories/add.status')}}</label>
                                                            @error("is_active")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mt-1">
                                                            <input type="radio" class="switchery" name="type"
                                                                   data-color="success" value="1" id="customRadio1" checked>
                                                            <label class="card-title ml-1" for="customRadio1">
                                                                {{__('admin/categories/add.mainCategory')}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-1">
                                                        <input type="radio" data-color="success" class="switchery"
                                                               name="type" value="2" id="customRadio1">
                                                        <label class="card-title ml-1" for="customRadio1">
                                                            {{__('admin/categories/add.subcategory')}}
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/categories/add.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/categories/add.save')}}
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
@section('script')
    <script>
        $('input:radio[name="type"]').change(
            function () {
                if (this.checked && this.value == '2') {
                    $('#cat_list').removeClass('hidden');
                } else {
                    $('#cat_list').addClass('hidden');
                }
            }
        );
    </script>
@endsection


