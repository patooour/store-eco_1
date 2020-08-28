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
                                <li class="breadcrumb-item active">{{__('admin/shipping.EditShippingMethod')}}
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
                                        id="basic-layout-form"> {{__('admin/shipping.EditShippingMethod')}} </h4>
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
                                        <form class="form"
                                              action="{{route('update.shipping.method',['id'=>$shippingMethod->id])}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{$shippingMethod->id}}">

                                            <div class="form-body">
                                                <h4 class="form-section"><i
                                                        class="ft-home"></i> {{__('admin/shipping.Edit')}} {{$shippingMethod->value}} </h4>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="value">  {{__('admin/shipping.Name')}} </label>
                                                            <input type="text" value="{{$shippingMethod->value}}"
                                                                   id="value"
                                                                   class="form-control"
                                                                   name="value">
                                                            @error('value')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="plain_value">  {{__('admin/shipping.ShippingValue')}} </label>
                                                            <input type="number" value="{{$shippingMethod->plain_value}}" id="plain_value"
                                                                   class="form-control"
                                                                   name="plain_value">
                                                            @error('plain_value')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>{{__('admin/shipping.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>{{__('admin/shipping.update')}}
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


