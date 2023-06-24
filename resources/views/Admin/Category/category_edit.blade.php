@extends('Admin.layouts.master')
@section('title','Category Edit')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 offset-3  mb-5">
                <span><a href="{{route('category#list')}}">Category List</a></span>
                <span>/ Edit your category</span>

                </div>

            </div>

            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Edit Your Category</h3>
                        </div>
                        <hr>
                        <form action="{{route('category#update')}}" method="post" novalidate="novalidate">

                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="categoryId" value="{{$category->id}}">
                                <label for="cc-payment" class="control-label mb-1 ">Name</label>
                                <input  name="categoryName" type="text" class="form-control @error('categoryName')
                                is-invalid
                            @enderror" aria-required="true" aria-invalid="false" value="{{old('categoryName',$category->name)}}" placeholder="Enter your new category...">
                                @error('categoryName')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-5">
                                 <a href="{{route('category#list')}}">
                                    <button id="payment-button" type="button" class="btn btn-lg btn-danger btn-block">
                                        <span id="payment-button-amount">Cancel</span>

                                    </button>
                                 </a>
                                </div>
                                <div class="col-4 offset-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Update</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
