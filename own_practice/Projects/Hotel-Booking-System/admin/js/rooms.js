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
            get_all_rooms();
        } else {
            alert_msg('error', 'Server Down');

        }

    }
    xhr.send(data);
}

function get_all_rooms() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/room_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        document.getElementById('room-data').innerHTML = this.responseText;

    }
    xhr.send('get_all_rooms');

}

function change_status(id, val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/room_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        if (this.responseText == 1) {
            alert_msg('success', 'Room Status Changed.');
            get_all_rooms();
        } else {
            alert_msg('error','Room Status not Changed.')
        }

    }
    xhr.send('change_status='+id+'&value='+val);
    
}

let edit_room_form_id = document.getElementById('editroom_form');



function edit_room(id) {
    //console.log(id);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/room_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        let data = JSON.parse(this.responseText);
        edit_room_form_id.elements['name'].value = data.roomdata.name;
        edit_room_form_id.elements['area'].value = data.roomdata.area;
        edit_room_form_id.elements['price'].value = data.roomdata.price;
        edit_room_form_id.elements['quantity'].value = data.roomdata.quantity;
        edit_room_form_id.elements['adult'].value = data.roomdata.adult;
        edit_room_form_id.elements['children'].value = data.roomdata.children;
        edit_room_form_id.elements['description'].value = data.roomdata.description;
        edit_room_form_id.elements['room_id'].value = data.roomdata.id;

        edit_room_form_id.elements['facilities'].forEach(el => {
            if (data.facilities.includes(Number(el.value))) {
                el.checked = true;
            }
        });

        edit_room_form_id.elements['features'].forEach(el => {
            if (data.features.includes(Number(el.value))) {
                el.checked = true;
            }
        });

    }
    xhr.send('get_room='+id);
    
}

edit_room_form_id.addEventListener('submit', function (e) {
    e.preventDefault();
    submit_edit_room();

});

function submit_edit_room() {
    let data = new FormData();
        data.append('room_id', edit_room_form_id['room_id'].value);
        data.append('name', edit_room_form_id['name'].value);
        data.append('area', edit_room_form_id['area'].value);
        data.append('price', edit_room_form_id['price'].value);
        data.append('quantity', edit_room_form_id['quantity'].value);
        data.append('adult', edit_room_form_id['adult'].value);
        data.append('children', edit_room_form_id['children'].value);
        data.append('description', edit_room_form_id['description'].value);

        let features = [];
        edit_room_form_id.elements['features'].forEach(el => {
            if (el.checked) {
                //console.log(el.value);
                features.push(el.value);
            }
        });

        let facilities = [];
        edit_room_form_id.elements['facilities'].forEach(el => {
            if (el.checked) {
                //console.log(el.value);
                facilities.push(el.value);
            }
        });
        data.append('features', JSON.stringify(features));
        data.append('facilities', JSON.stringify(facilities));

        data.append('submit_edit_room', '');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/room_crud.php", true);
        //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            //console.log(this.responseText);
            //hide the  member-details form
            var myModal = document.getElementById('editroom');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert_msg('success', 'Room Edited');
                edit_room_form_id.reset();
                get_all_rooms();
            } else {
                alert_msg('error', 'Server Down');

            }

        }
        xhr.send(data);
    
}

window.onload = function () {
    get_all_rooms();
}