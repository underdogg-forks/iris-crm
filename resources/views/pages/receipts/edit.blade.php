@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Édition d'une commande
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($order, ['action' => ['OrderController@update', $order->id], 'method' => 'patch']) !!}

                        @include('pages.orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('js-app-scope')
    @parent
    IrisCrm.initDatePicker('order_date');
    IrisCrm.initDatePicker('delivery_deadline');

@endsection
