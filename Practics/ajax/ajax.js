
let add_form_id = document.getElementById('add_student_form');

add_form_id.addEventListener('submit', function (e) {
    e.preventDefault();
    add_student();
});

function add_student() {
    let data = new FormData();

    data.append('name', add_form_id['name'].value);
    data.append('email', add_form_id['email'].value);
    data.append('phone', add_form_id['phone'].value);
    data.append('age', add_form_id['age'].value);
    data.append('marks', add_form_id['marks'].value);
    data.append('add_student', '');

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'crud.php', true);

    xhr.onload = function () {
        if (this.responseText == 1) {
            responce_msg('success', 'You Successfully registered.');
            //alert('Successfully Submitted Your data.');
            add_form_id.reset();
            get_student_data();
        } else {
            responce_msg('error', 'Something went wrong.');
            //alert('Something Went wrong');
            //alert_msg('error', 'Some Thing went wrong');

        }
    }

    xhr.send(data);
}

function get_student_data() {

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('stu-data').innerHTML = this.responseText;

    }
    xhr.send('get_student_data');

}

function delete_student(id) {
    if (confirm('Are You Sure!Want to delete it?')) {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'crud.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (this.responseText == 1) {
                responce_msg('success', 'You Successfully Deleted Data.');
                get_student_data();
            } else {
                responce_msg('error', 'Something went wrong');
                //alert('Something went wrong');
            }

        }
        xhr.send('delete_student=' + id);
    }

}
let edit_student_form_id = document.getElementById('edit_student_form');

edit_student_form_id.addEventListener('submit', function (e) {
    e.preventDefault();
    edit_student();
});

function get_one_student(id) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {

        let data = JSON.parse(this.responseText);

        edit_student_form_id.elements['u_name'].value = data.name;
        edit_student_form_id.elements['u_email'].value = data.email;
        edit_student_form_id.elements['u_phone'].value = data.phone;
        edit_student_form_id.elements['u_age'].value = data.age;
        edit_student_form_id.elements['u_marks'].value = data.marks;
        edit_student_form_id.elements['stu_id'].value = data.id;


    }

    xhr.send('get_one_student=' + id);

}

function edit_student() {
    let data = new FormData();

    data.append('name', edit_student_form_id['u_name'].value);
    data.append('email', edit_student_form_id['u_email'].value);
    data.append('phone', edit_student_form_id['u_phone'].value);
    data.append('age', edit_student_form_id['u_age'].value);
    data.append('marks', edit_student_form_id['u_marks'].value);
    data.append('id', edit_student_form_id['stu_id'].value);
    data.append('edit_student', '');

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'crud.php', true);

    xhr.onload = function () {
        if (this.responseText == 1) {
            var myModal = document.getElementById('editForm');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
            responce_msg('success', 'You Successfully Updated Yout Data.');
            edit_student_form_id.reset();
            get_student_data();
        } else {
            responce_msg('error', 'Something went wrong.');
            //alert('Something Went wrong');
            //alert_msg('error', 'Some Thing went wrong');

        }
    }

    xhr.send(data);

}

function search_stu(name) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('stu-data').innerHTML = this.responseText;

    }
    xhr.send('search_stu=' + name);

}


window.onload = function () {
    get_student_data();
    get_one_student();

}
