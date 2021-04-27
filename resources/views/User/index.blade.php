@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">User Management</p>
            <button class="float-right create-button" onclick="window.location='{{ route('user.create')  }} '">Create</button>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm">
                    <label class="p-0 m-0 sub-title">Search</label>
                    <input type="text" name="search" class="form-control searchbar" name="search">   
                </div>
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">Filter by</label>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; ">
                        <option value="">All</option>
                        <option value="">Student</option>
                        <option value="">Teacher</option>
                        <option value="">Admin</option>
                    </select>
                </div>
                <div class="form-group col-sm-auto">
                    <br>
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div>
            </div>
            
            <div class="row mx-3 py-2">               
                <a href='{{ url('user-show') }}' class="userSelection">
                <div class="col-md-auto zoom">
                        <img class="mx-auto d-block userSelection-photo" src="{{ asset('images/1.jpg') }}">
                        <p class="mt-1 DivHeaderText text-center user-name">James Patrick Diwa</p>
                        <small class="d-flex justify-content-center user-role">A117A0909 (ADMIN)</small>    
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
