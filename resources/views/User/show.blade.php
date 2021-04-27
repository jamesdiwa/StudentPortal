@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">User Management</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 pt-4">
            <div class="row">
                <div class="col-sm-3 pl-4 pt-2">
                    <div class="mt-2 mx-auto overflow-hidden" style="width: 125px; height: 125px; border: 2px solid white;">
                        <img src="{{ asset('images/1.jpg') }}" style="width: 100%; height: 100%">
                    </div>
                    <p class="mt-2 p-0 m-0 text-center" style="color: #3d3d3d; font-weight: 700; font-size: 20px">James Patrick Diwa</p>
                    <p class="p-0 m-0 text-center" style="color: #676767; font-size: 15px">A117A0909 (Administrator)</p>
                </div>
                <div class="col-sm-9">
                    <p class="DivHeaderText pb-2 mb-2">USER INFORMATION</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="label">Date of Birth</label>
                            <p class="data pl-3">July 18, 1996</p>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Gender</label>
                            <p class="data pl-3">Male</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Present Address</label>
                            <p class="data pl-3">Lot 30 Block 8N Hito Street, Longos, Malabon City</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="label">Email Address</label>
                            <p class="data pl-3">jamesdiwa05@gmail.com</p>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Contact Number</label>
                            <p class="data pl-3">09164389070</p>
                        </div>
                    </div>
                </div>
            </div>
                
            {{-- <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="label">Full Name</p>
                            <p class="data pl-3">James Patrick Marabe Diwa</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="label">Account Type</p>
                            <p class="data pl-3">Administrator</p>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="label">Date of Birth</p>
                            <p class="data pl-3">July 18, 1996</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="label">Gender</p>
                            <p class="data pl-3">Male</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="label">Civil Status</p>
                            <p class="data pl-3">Single</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-end">
                        <img id='photoDisplay' class='mr-4 userPhoto-show' src='{{ asset('images/1.jpg') }}'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="label">Complete Address</p>
                    <p class="data pl-3">Lot 30 Block 8N Hito Street, Longos, Malabon City</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="label">Email Address</p>
                    <p class="data pl-3">jamesdiwa05@gmail.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="label">Contact Number</p>
                    <p class="data pl-3">09164389070</p>
                </div>
            </div> --}}
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="edit-button">Edit</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('user.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
