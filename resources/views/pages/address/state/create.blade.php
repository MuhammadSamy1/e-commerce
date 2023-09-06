@extends('layouts.master')
@section('css')
    @toaster_css
    @section('title')
        create States
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        create States
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="ml-auto">
                        <a href="{{ route('states.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                            <span class="text">Back to states</span>
                        </a>
                    </div>
                    <form method="post" action="{{ route('states.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="name">Name states</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="name">countries Name</label>
                                <select name="country_id" id="country_id">
                                    <option selected disabled>Select country Name</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">Next</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toaster_js
    @toaster_render
@endsection
