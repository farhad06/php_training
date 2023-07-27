let addroom_form_id = document.getElementById('addroom_form');

addroom_form_id.addEventListener('submit', function (e) {
    e.preventDefault();
    add_room();
});

function add_room() {
    let data = new FormData();
    data.append('name', addroom_form_id['name'].value);
    data.append('area', addroom_form_id['area'].value);
    data.append('price', addroom_form_id['price'].value);
    data.append('quantity', addroom_form_id['quantity'].value);
    data.append('adult', addroom_form_id['adult'].value);
    data.append('children', addroom_form_id['children'].value);
    data.append('description', addroom_form_id['description'].value);

    let features = [];
    addroom_form_id.elements['features'].forEach(el => {
        if (el.checked) {
            //console.log(el.value);
            features.push(el.value);
        }
    });

    let facilities = [];
    addroom_form_id.elements['facilities'].forEach(el => {
        if (el.checked) {
            //console.log(el.value);
            facilities.push(el.value);
        }
    });
    data.append('features', JSON.stringify(features));
    data.append('facilities', JSON.stringify(facilities));

    data.append('add_room', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/room_crud.php", true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        //hide the  member-details form
        var myModal = document.getElementById('addroom');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert_msg('success', 'Room Added');
            addroom_form_id.reset();
        } else {
            alert_msg('error', 'Server Down');

        }

    }
    xhr.send(data);
}