
let features_form_id = document.getElementById('features_form');
let facility_form_id = document.getElementById('facility_form');


features_form_id.addEventListener('submit', function (e) {
    e.preventDefault();
    add_features();
});

function add_features() {
    let data = new FormData();
    data.append('name', features_form.elements['features_name'].value);
    data.append('add_features', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        //hide the  member-details form
        var myModal = document.getElementById('features');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert_msg('success', 'Features Added');
            features_form.elements['features_name'].value = "";
            get_features();

        } else {
            alert_msg('error', 'Something went wrong!')
        }

    }
    xhr.send(data);
}

function get_features() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        document.getElementById('features-data').innerHTML = this.responseText;

    }
    xhr.send('get_features');

}

function detele_features(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.responseText == 1) {
            console.log(this.responseText);
            alert_msg('success', 'Features Deleted');
            get_features();

        } else {
            alert_msg('error', 'Something went Wrong');
        }


    }
    xhr.send('detele_features=' + val);
}

facility_form_id.addEventListener('submit', function (e) {
    e.preventDefault();
    add_facility();
});

function add_facility() {
    let data = new FormData();
    data.append('name', facility_form.elements['facility_name'].value);
    data.append('icon', facility_form.elements['facility_icon'].files[0]);
    data.append('description', facility_form.elements['facility_description'].value);
    data.append('add_facility', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities_crud.php", true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        //hide the  member-details form
        var myModal = document.getElementById('facilities');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert_msg('error', 'Only SVG format allowed.');
        } else if (this.responseText == 'inv_size') {
            alert_msg('error', 'Please Upload File Less than 1mb.');
        } else if (this.responseText == 'upd_failed') {
            alert_msg('error', 'Image Upload Failded');

        } else {
            alert_msg('success', 'Facility Added');
            facility_form.reset();
            
        }

    }
    xhr.send(data);
}

window.onload = function () {
    get_features();
}
