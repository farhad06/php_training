<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center bg-dark text-light mt-2 rounded py-2">CRUD OPERATION WITH LARAVEL & AJAX</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#add_student">
            Add Student
        </button>
        <section id="msg" class="text-success"></section>
        <div class="table table-responsive">
            <table class="table table-bordered mt-2" id="show-data">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tablebody">

                </tbody>

            </table>
        </div>

        <!-- Add student Modal form -->
        <div class="modal fade" id="add_student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Add Student</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalbody">
                        <form id="addform">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" id="email" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" id="phone" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Age</label>
                                <input type="text" id="age" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <textarea type="text" id="address" rows="2" class="form-control shadow-none"
                                    style="resize:none;"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary shadow-none"
                                    id="addstudent">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div> --}}
                </div>
            </div>
        </div>

        {{-- edit student modal form --}}
        <div class="modal fade" id="edit_student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Edit Student</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalbody">
                        <form id="edit-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" id="e_name" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" id="e_email" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" id="e_phone" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Age</label>
                                <input type="text" id="e_age" class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <textarea type="text" id="e_address" rows="2" class="form-control shadow-none"
                                    style="resize:none;"></textarea>
                            </div>
                            <input type="hidden" name="" id="e_id">
                            <div>
                                <button type="submit" class="btn btn-sm btn-success shadow-none" onclick=""
                                    id="editdata">UPDATE</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div> --}}
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            var loadTableData;
            $(document).ready(function(){
                loadTableData= function (){
                    $.ajax({
                        url:"{{url('/get_student')}}",
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                        //loadTableData(data);
                        // console.log(data);
                        var tbody=$('#tablebody');
                        tbody.empty();
                        $.each(data,function(index,item){
                            tbody.append(
                            `<tr> 
                                <td>${item.name}</td>
                                <td>${item.email}</td>
                                <td>${item.phone}</td>
                                <td>${item.age}</td>
                                <td>${item.address}</td>
                                <td><button class="btn btn-sm btn-success shadow-none"onclick="edit_student(${item.id})" data-bs-toggle="modal" data-bs-target="#edit_student">UPDATE</button>
                                    <button class="btn btn-sm btn-danger shadow-none" id="delete-btn" onclick="delete_student(${item.id})">DELETE</button>
                                </td>
                                </tr>`
                                // onclick="delete_student(${item.id})"
                            );     
                            });
                        }
                    });
                }  

                /*
                    '<tr>' +
                        '<td>'+{item.name}+'</td>'+
                        '<td>'+item.email+'</td>'+
                        '<td>'+item.phone+'</td>'+
                        '<td>'+item.age+'</td>'+
                        '<td>'+item.address+'</td>'+
                        '<td><a href="" class="btn btn-sm btn-success shadow-none">UPDATE</a> <a href=""
                                class="btn btn-sm btn-danger shadow-none">DELETE</a></td>'
                    +'</tr>'
                */
                
                loadTableData();
            
            // function loadTableData(data){
            //         var tbody=$('#tablebody');
            //         tbody.empty();
            //         $.each(data,function(index,item){
                    
            //         tbody.append(
            //             '<tr>' +
            //                 '<td>'+{item.name}+'</td>'+
            //                 '<td>'+item.email+'</td>'+
            //                 '<td>'+item.phone+'</td>'+
            //                 '<td>'+item.age+'</td>'
            //             +'</tr>'
            //         );
                    
            //         });
            
            // }
            $('#addstudent').on('click',function(e){
                e.preventDefault();
                var studentData={
                    'name':$('#name').val(),
                    'email':$('#email').val(),
                    'phone':$('#phone').val(),
                    'age':$('#age').val(),
                    'address':$('#address').val(),
                    '_token':'{{csrf_token()}}'
                }
                //console.log(studentData);
                $.ajax({
                    url:"{{url('/submit')}}",
                    type:"POST",
                    data:studentData,
                    dataType:'json',
                    success:function(data){
                    //alert(data.message);
                    //console.log(data.status);
                    $('#addform').trigger('reset');
                    $('#add_student').modal('hide');
                    if (data.status == 200) {
                    Swal.fire(
                        'Added!',
                        'Student Added Successfully!',
                        'success'
                    )
                    }
                    loadTableData();
                    //$('#msg').text(data.message);
                    
                    },
                    error:function(data){
                        console.log(data);
                    }
                
                });
            });

            $('#editdata').on('click',function(e){
                e.preventDefault();
                var editStudentData={
                    'e_name':$('#e_name').val(),
                    'e_email':$('#e_email').val(),
                    'e_phone':$('#e_phone').val(),
                    'e_age':$('#e_age').val(),
                    'e_address':$('#e_address').val(),
                    'e_id':$('#e_id').val(),
                    '_token':'{{csrf_token()}}'
                }
                console.log(editStudentData);
                $.ajax({
                    url:`{{url('/update_student')}}`,
                    type:"POST",
                    data:editStudentData,
                    dataType:'json',
                    success:function(data){
                    //alert(data.message);
                    //console.log(data);
                    $('#edit_student').modal('hide');
                        if (data.status == 200) {
                        Swal.fire(
                        'Updated!',
                        'Student Updated Successfully!',
                        'success'
                    )
                    }
                    //$('#modalbody').trigger('reset');
                        loadTableData();
                    //$('#msg').text(data.message);
                    
                    },
                    error:(error)=>{
                    //console.log("Error Occured",data);
                        if(error) throw error;
                    }
                    
                });
            });

            });
            function delete_student(id){
                    //console.log(id);
                  if(confirm("Do you Want to delete it?")){
                    $.ajax({
                        url:`{{url('/deletestudent')}}/${id}`,
                        type:"GET",
                        data:"'_token':'{{csrf_token()}}'",
                        success:function(data){
                            //console.log(data);
                            if (data.status == 200) {
                            Swal.fire(
                                'Deleted!',
                                'Student Delete Successfully!',
                                'success'
                            )
                            }
                            loadTableData();
                        },
                        error:(error)=>{
                            if(error) throw error;
                        }
                    });
                  }
            }

            function edit_student(id){
                $.ajax({
                    url:`{{url('/editstudent')}}/${id}`,
                    type:"GET",
                    success:function(data,status){
                        // console.log(data);
                        // var studata=data;
                        $('#e_name').val(data.name);
                        $('#e_email').val(data.email);
                        $('#e_phone').val(data.phone);
                        $('#e_age').val(data.age);
                        $('#e_address').val(data.address);
                        $('#e_id').val(data.id);
                    }

                });
            }

            // function update_student(){
            //     var editStudentData={
            //         'e_name':$('#e_name').val(),
            //         'e_email':$('#e_email').val(),
            //         'e_phone':$('#e_phone').val(),
            //         'e_age':$('#e_age').val(),
            //         'e_address':$('#e_address').val(),
            //         'e_id':$('#e_id').val(),
            //         '_token':'{{csrf_token()}}'
            //     }
            //     console.log(editStudentData);
            //     $.ajax({
            //         url:`{{url('/update_student')}}`,
            //         type:"POST",
            //         data:editStudentData,
            //         dataType:'json',
            //         success:function(data){
            //             //alert(data.message);
            //             //console.log(data);
            //             $('#edit_student').modal('hide');
            //             if (data.status == 200) {
            //                 Swal.fire(
            //                     'Updated!',
            //                     'Student Updated Successfully!',
            //                     'success'
            //                 )
            //             }
            //             //$('#modalbody').trigger('reset');
            //             loadTableData();
            //             //$('#msg').text(data.message);
                        
            //         },
            //         error:(error)=>{
            //             //console.log("Error Occured",data);
            //             if(error) throw error;
            //         }
                
            //     });

            // }

        </script>
    </div>
</body>

</html>