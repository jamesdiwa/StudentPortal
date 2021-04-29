@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Class Schedule</p>
        </div>
    </div>
    <div class="container">       
        <div class="DivTemplate mt-3 pt-3">
            <div class="form-row mt-2">
                <div class="form-group col-sm-6">
                    <label class="input-label">Grade Level</label>
                    <select name="" id="" class="form-control">
                        <option value="">Grade 1</option>
                        <option value="">Grade 2</option>
                        <option value="">Grade 3</option>
                        <option value="">Grade 4</option>
                        <option value="">Grade 5</option>
                        <option value="">Grade 6</option>
                        <option value="">Grade 7</option>
                        <option value="">Grade 8</option>
                        <option value="">Grade 9</option>
                        <option value="">Grade 10</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Section</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">School Year</label>
                    <select name="" id="" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Class Adviser</label>
                    <select name="" id="" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Additional Notes</label>
                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <!-- Day -->
            <div id="scheduleDiv">
                <div style="border: 1px solid #d11d27; padding: 10px; border-radius: 5px">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label" style="color: #1e1e1e">Day</label>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="monday">
                                <label for="monday" class="form-check-label input-label">Monday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="tuesday">
                                <label for="tuesday" class="form-check-label input-label">Tuesday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="wednesday">
                                <label for="wednesday" class="form-check-label input-label">Wednesday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="thursday">
                                <label for="thursday" class="form-check-label input-label">Thursday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="friday">
                                <label for="friday" class="form-check-label input-label">Friday</label>
                            </div>
                        </div>
                    </div>
                    <table class="table table-borderless mt-3">
                        <thead class="text-center">
                            <th width="150px">Time From</th>
                            <th width="150px">Time To</th>
                            <th width="250px">Subject</th>
                            <th width="250px">Subject Teacher</th>
                            <th width="150px">Action</th>
                        </thead>
                        <tbody id="timeFields">
                            <tr>
                                <td>
                                    <input type="time" name="" id="" class="form-control">
                                </td>
                                <td>
                                    <input type="time" name="" id="" class="form-control">
                                </td>
                                <td>
                                    <select name="" id="" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" id="" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-row">
                        <div class="form-group col-sm-12 d-flex justify-content-center">
                            <button type="button" id="addTime" class="create-button">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="edit-button mt-2" style="width: 100%" id="addSchedule">Add Schedule</button>
            {{-- <!-- Tuesday -->
            <p class="DivHeaderText">TUESDAY</p>
            <table class="table table-borderless mt-3">
                <thead class="text-center">
                    <th width="150px">Time From</th>
                    <th width="150px">Time To</th>
                    <th width="250px">Subject</th>
                    <th width="250px">Subject Teacher</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody id="tuesFields">
                    <tr>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group col-sm-12 d-flex justify-content-center">
                    <button type="button" id="addTuesday" class="create-button">Add</button>
                </div>
            </div>
            <!-- Wednesday -->
            <p class="DivHeaderText">WEDNESDAY</p>
            <table class="table table-borderless mt-3">
                <thead class="text-center">
                    <th width="150px">Time From</th>
                    <th width="150px">Time To</th>
                    <th width="250px">Subject</th>
                    <th width="250px">Subject Teacher</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody id="wedFields">
                    <tr>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group col-sm-12 d-flex justify-content-center">
                    <button type="button" id="addWednesday" class="create-button">Add</button>
                </div>
            </div>
            <!-- Thursday -->
            <p class="DivHeaderText">THURSDAY</p>
            <table class="table table-borderless mt-3">
                <thead class="text-center">
                    <th width="150px">Time From</th>
                    <th width="150px">Time To</th>
                    <th width="250px">Subject</th>
                    <th width="250px">Subject Teacher</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody id="thursFields">
                    <tr>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group col-sm-12 d-flex justify-content-center">
                    <button type="button" id="addThursday" class="create-button">Add</button>
                </div>
            </div>
            <!-- Friday -->
            <p class="DivHeaderText">FRIDAY</p>
            <table class="table table-borderless mt-3">
                <thead class="text-center">
                    <th width="150px">Time From</th>
                    <th width="150px">Time To</th>
                    <th width="250px">Subject</th>
                    <th width="250px">Subject Teacher</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody id="friFields">
                    <tr>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <input type="time" name="" id="" class="form-control">
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group col-sm-12 d-flex justify-content-center">
                    <button type="button" id="addFriday" class="create-button">Add</button>
                </div>
            </div> --}}
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('classSchedule.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $("#addTime").click(function(){
		$("#timeFields").append('<tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td></tr>');
	});
    $("#addSchedule").click(function(){
		$("#scheduleDiv").append('<div class="mt-2" style="border: 1px solid #d11d27; padding: 10px; border-radius: 5px"><div class="form-row"><div class="form-group col-sm-12"><label class="input-label" style="color: #1e1e1e">Day</label><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Monday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Tuesday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Wednesday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Thursday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Friday</label></div></div></div><table class="table table-borderless mt-3"><thead class="text-center"><th width="150px">Time From</th><th width="150px">Time To</th><th width="250px">Subject</th><th width="250px">Subject Teacher</th><th width="150px">Action</th></thead><tbody id="timeFields"><tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td><select name="" id="" class="form-control"><option value=""></option> </select></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td></td></tr></tbody></table><div class="form-row"><div class="form-group col-sm-12 d-flex justify-content-center"><button type="button" id="addTime" class="create-button">Add</button></div></div></div>');
	});
    // $("#addTuesday").click(function(){
	// 	$("#tuesFields").append('<tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td></tr>');
	// });
    // $("#addWednesday").click(function(){
	// 	$("#wedFields").append('<tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td></tr>');
	// });
    // $("#addThursday").click(function(){
	// 	$("#thursFields").append('<tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td></tr>');
	// });
    // $("#addFriday").click(function(){
	// 	$("#friFields").append('<tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td></tr>');
	// });
    $("#timeFields").on('click','.remove',function(){
        $(this).parent().parent().remove();
    });
    // $("#tuesFields").on('click','.remove',function(){
    //     $(this).parent().parent().remove();
    // });
    // $("#wedFields").on('click','.remove',function(){
    //     $(this).parent().parent().remove();
    // });
    // $("#thursFields").on('click','.remove',function(){
    //     $(this).parent().parent().remove();
    // });
    // $("#friFields").on('click','.remove',function(){
    //     $(this).parent().parent().remove();
    // });
</script>

@endsection
