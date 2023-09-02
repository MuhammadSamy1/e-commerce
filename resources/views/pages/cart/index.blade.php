@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        orders
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        Orders
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('orders.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Create New orders</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name Customers</th>
                                            <th>Name Category</th>
                                            <th>Name Products</th>
                                            <th>Price</th>
                                            <th>quantity</th>
                                            <th>size</th>
                                            <th>color</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $order)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$order->customers->name}}</td>
                                                <td>{{$order->categories->name}}</td>
                                                <td>{{$order->products->name}}</td>
                                                <td>{{$order->amount}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td>{{$order->size}}</td>
                                                <td>{{$order->color}}</td>
                                                <td>

                                                    <a href="{{route('orders.edit',$order->id)}}" class="btn btn-info btn-sm" title="Edit" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('orders.show',$order->id)}}" class="btn btn-info btn-sm" title="Show" role="button" aria-pressed="true"><i class="fa fa-book"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $order->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            {{-- @include('pages.library.destroy') --}}
                                            <div class="modal fade" id="delete_book{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف {{$order->products->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('orders.destroy',$order->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id" value="{{$order->id}}">
                                                                {{-- <input type="hidden" name="file_name" value="{{$order->image}}"> --}}
                                                                <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من عملية الحذف ؟{{ $order->products->name }}</h5>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button  class="btn btn-danger">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
