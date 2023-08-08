
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

    let gender_data = document.querySelector('input[name="gender"]:checked');

    data.append('gender', gender_data.value);
    data.append('city', add_form_id['city'].value);

    let language = [];
    add_form_id.elements['lang'].forEach(el => {
        if (el.checked) {
            //console.log(el.value);
            language.push(el.value);
        }

    });
    data.append('language', JSON.stringify(language));
    data.append('image', add_form_id['image'].files[0]);
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

        console.log(data);

        edit_student_form_id.elements['u_name'].value = data.name;
        edit_student_form_id.elements['u_email'].value = data.email;
        edit_student_form_id.elements['u_phone'].value = data.phone;
        edit_student_form_id.elements['u_age'].value = data.age;
        edit_student_form_id.elements['u_marks'].value = data.marks;
        edit_student_form_id.elements['stu_id'].value = data.id;
        edit_student_form_id.elements['u_city'].value = data.city;
        edit_student_form_id.elements['u_gender'].value = data.gender;
        //edit_student_form_id.elements['u_lang'].value = data.language;
        edit_student_form_id.elements['u_lang'].forEach(el => {
            if (data.language.includes(el.value)) {
                el.checked = true;
            }
        });

        let disp_img = document.getElementById('disp_img');
        disp_img.src = data.image;


    }

    xhr.send('get_one_student=' + id);
    
}

let get_one_student_btn_id = document.getElementById('get_one_student_btn_id');

// get_one_student_btn_id.addEventListener('click', function () {
//     get_one_student();
    
// });

function edit_student() {
    let data = new FormData();

    data.append('name', edit_student_form_id['u_name'].value);
    data.append('email', edit_student_form_id['u_email'].value);
    data.append('phone', edit_student_form_id['u_phone'].value);
    data.append('age', edit_student_form_id['u_age'].value);
    data.append('marks', edit_student_form_id['u_marks'].value);
    data.append('id', edit_student_form_id['stu_id'].value);

    let gender_data = document.querySelector('input[name="u_gender"]:checked');

    data.append('gender', gender_data.value);
    data.append('city', edit_student_form_id['u_city'].value);

    let language = [];
    edit_student_form_id.elements['u_lang'].forEach(el => {
        if (el.checked) {
            //console.log(el.value);
            language.push(el.value);
        }

    });
    data.append('language', JSON.stringify(language));
    data.append('image', edit_student_form_id['u_image'].files[0]);

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
    
}
