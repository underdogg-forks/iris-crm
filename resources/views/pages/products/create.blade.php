@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('new-product') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.product:new')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'files' => true]) !!}

                    @include('pages.products.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        IrisCrm.initDatePicker('sale_datestart');
        IrisCrm.initDatePicker('sale_dateend');

    </script>

@endsection
