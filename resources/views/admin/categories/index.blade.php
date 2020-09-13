@extends('layouts.admin')


@section('title',' admin mainCategories')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{__('admin/categories/index.main categories')}} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/categories/index.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/categories/index.main categories')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('admin/categories/index.all main categories')}} </h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th> #</th>
                                                <th> {{__('admin/categories/index.name')}}</th>
                                                <th>{{__('admin/categories/index.slug')}}</th>
                                                <th>{{__('admin/categories/index.image')}}</th>
                                                <th>{{__('admin/categories/index.status')}}</th>
                                                <th>{{__('admin/categories/index.operation')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($categories)
                                                @foreach($categories as $k=> $category)

                                                    <tr>
                                                        <td> {{$k + 1}} </td>
                                                        <td> {{$category->name}} </td>
                                                        <td> {{$category->slug}} </td>
                                                        <td><img src="{{$category->image}}"
                                                                 height="125"
                                                                 width="75" alt="{{$category->name}}"> </td>
                                                        <td> {{$category->getActive()}} </td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.edit.mainCategory' , $category->id)}}"
                                                                   class="btn btn-outline-primary ft-edit-2 box-shadow-3 mr-1 mb-1">

                                                                </a>
{{--                                                                {{__('admin/categories/index.edit')}}--}}
{{--                                                                {{__('admin/categories/index.delete')}}--}}
{{--                                                                {{__('admin/categories/index.active')}}--}}
                                                                <a href="{{route('admin.delete.mainCategory' , $category->id)}}"
                                                                   class="btn btn-outline-danger ft-trash-2 box-shadow-3 mr-1 mb-1" >

                                                                </a>
{{--                                                                <a href="#"--}}
{{--                                                                   class="btn btn-outline-warning  btn-min-width box-shadow-3 mr-1 mb-1">--}}
{{--                                                                    @if($category->is_active == '1')--}}
{{--                                                                        --}}
{{--                                                                    @else--}}
{{--                                                                      --}}

{{--                                                                    @endif--}}
{{--                                                                </a>--}}



                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                            {{$categories -> links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection


