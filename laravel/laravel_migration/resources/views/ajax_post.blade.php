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
        <h1 class="text-center bg-dark text-light mt-2 rounded">CRUD OPERATION WITH LARAVEL & AJAX</h1>
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
                    </tr>
                </thead>
                <tbody id="tablebody">

                </tbody>

            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="add_student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Add Student</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                onclick="addStudent()">SUBMIT</button>
                        </div>
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
            $(document).ready(function(){
                    $.ajax({
                    url:"{{url('/get_student')}}",
                    type:"GET",
                    dataType:'json',
                    success:function(data){
                    loadTableData(data);
                    }
                    });
            
            function loadTableData(data){
                    var tbody=$('#tablebody');
                    tbody.empty();
                    $.each(data,function(index,item){
                    
                    tbody.append(
                        '<tr>' +
                            '<td>'+item.name+'</td>'+
                            '<td>'+item.email+'</td>'+
                            '<td>'+item.phone+'</td>'+
                            '<td>'+item.age+'</td>'
                        +'</tr>'
                    );
                    
                    });
            
            }
            function addStudent(){
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
                $('#add_student').modal('hide');
                if (data.status == 200) {
                Swal.fire(
                    'Added!',
                    'Student Added Successfully!',
                    'success'
                )
                }
                //loadTableData(data)
                //$('#msg').text(data.message);
                
                },
                error:function(data){
                    console.log(data);
                }
            
            });
            }
            
            });
           

        </script>
    </div>
</body>

</html>