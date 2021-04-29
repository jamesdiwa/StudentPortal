@extends('layouts.master')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title"><a href="/students" style="color: white"><i class="fas fa-arrow-left"></i></a> Newly Registered Students</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm">
                    <input type="text" name="search" class="form-control searchbar" name="search" placeholder="Search">   
                </div>
                <div class="form-group col-sm-auto">
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div>
            </div>
            <table class="table table-borderless">
                <thead class="thead-bg">
                    <th width="350px">Student Name</th>
                    <th width="150px">Status</th>
                    <th width="350px" class="text-center">Action</th>
                </thead>
                <tbody class="tbody-data">
            
                    @foreach($students as $student)
                        <tr>
                            <td class="align-middle">{{$student->firstName}} {{$student->middleName}} {{$student->lastName}}</td>
                            <td class="align-middle"><span style="color: red">{{$student->status}}</span></td>
                            <td class="text-center">
                                <button style="button" class="search-button mx-1" onclick="window.location='{{ route('newStudent.show',$student->id) }}'">View</button>
                                <button style="button" class="update-button mx-1" onclick="window.location='{{ route('newStudent.edit',$student->id) }}'">Enlist</button>
                                <button style="submit" class="delete-button mx-1" onclick="submitDeleteForm(this)">Delete</button>
                                <form class="deleteForm" method='POST' action='{{ route('newStudent.destroy', $student->id) }}'>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    var msg = "{{Session::get('success')}}";
    var exist = "{{Session::has('success')}}";
    if(exist){
        Swal.fire({
            icon: 'success',
            title: msg,
            showConfirmButton: false,
            timer: 2000,
        });
    }
    
    function submitDeleteForm(thisBtn){
        $(thisBtn).closest("tr").find('.deleteForm').submit();
    }

</script>
@endsection