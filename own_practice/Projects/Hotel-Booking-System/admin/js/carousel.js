let general_data, contact_data;
let carousel_image_form = document.getElementById('carousel_image_form');
let carousel_image_input = document.getElementById('carousel_image_input');


carousel_image_form.addEventListener('submit', function (e) {
    e.preventDefault();

    add_image();

});

function add_image() {
    let data = new FormData();
    //data.append('name', member_name_input.value);
    data.append('picture', carousel_image_input.files[0]);
    data.append('add_image', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        //hide the  member-details form
        var myModal = document.getElementById('carouselImage');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert_msg('error', 'Only JPG JPEG and PNG format allowed.');
            carousel_image_input.value = "";
        } else if (this.responseText == 'inv_size') {
            alert_msg('error', 'Please Upload File Less than 2mb.');
            carousel_image_input.value = "";
        } else if (this.responseText == 'upd_failed') {
            alert_msg('error', 'Image Upload Failded');

        } else {
            alert_msg('success', 'New Image Added');
            carousel_image_input.value = "";
            get_image();
        }

    }
    xhr.send(data);
}
function get_image() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        document.getElementById('carousel-data').innerHTML = this.responseText;

    }
    xhr.send('get_image');

}
function detele_image(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert_msg('success', 'Image Deleted');
            get_image();
        } else {
            alert_msg('error', 'Image Not Deleted');
        }


    }
    xhr.send('detele_image=' + val);
}

window.onload = function () {
    get_image();
}

