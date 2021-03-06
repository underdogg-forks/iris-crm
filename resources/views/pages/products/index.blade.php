@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('products') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:products')}}
            @if($products->count() > 0)
                ({{$products->count()}})
            @endif
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-blue btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="{!! action('ProductController@create') !!}">
                <i class="fa fa-cubes"></i> {{trans('app.general:create')}}
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @if($products->count() > 0)
            <div class="box box-primary">
                <div class="box-body">
                    @include('pages.products.table')
                </div>
            </div>
        @else
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.product:no-products-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.product:no-products-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="{!! action('ProductController@create') !!}">
                    <i class="fa fa-cubes"></i> {{trans('app.general:create')}} </a>
                </div>
            </div>
        @endif
    </div>
@endsection

