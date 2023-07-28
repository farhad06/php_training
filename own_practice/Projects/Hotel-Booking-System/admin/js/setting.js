
let general_data, contact_data;

let general_form_data = document.getElementById('general_settings_form');

let site_title_input = document.getElementById('site_title_input');
let site_about_input = document.getElementById('site_about_input');

let management_team_form = document.getElementById('management_team_form');

let member_name_input = document.getElementById('member_name_input');
let member_picture_input = document.getElementById('member_picture_input');


//general modal form not submit with out data
general_form_data.addEventListener('submit', function (e) {
    e.preventDefault();
    upload_general_data(site_title_input.value, site_about_input.value);

});


//this function is used to get data from database
function get_general_data() {
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');

    let shutdown_btn = document.getElementById('shutdown-btn');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        general_data = JSON.parse(this.responseText);
        //console.log(general_data);
        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_input.value = general_data.site_title;
        site_about_input.value = general_data.site_about;

        if (general_data.shutdown == 0) {
            shutdown_btn.checked = false;
            shutdown_btn.value = 0;
        } else {
            shutdown_btn.checked = true;
            shutdown_btn.value = 1;
        }

    }
    xhr.send('get_general_data');

}
//this function is used to update data 
function upload_general_data(site_title_value, site_about_value) {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //hide the edit modal form
        var myModal = document.getElementById('generalSetting');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert_msg('success', 'Data Changes');
            get_general_data();
        } else {
            alert_msg('danger', 'No Data Changes');
        }

    }
    xhr.send('site_title=' + site_title_value + '&site_about=' + site_about_value + '&upload_general_data');


}
//this function is used for  site shutdown on/off
function update_shutdown(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        console.log(this.responseText);
        if (this.responseText == 1 && general_data.shutdown == 0) {
            alert_msg('success', 'Site has been Shutdown!');
        } else {
            alert_msg('success', 'Shutdown mode off!');

        }
        get_general_data();
    }
    xhr.send('update_shutdown=' + val);

}

//this function is used for get contact details from database
function get_contact_data() {

    //all the  ids to showing data 
    let contacts_details_ids = ['address', 'gmap', 'phone_no', 'mail', 'facebook', 'twitter', 'instagram'];
    //all the  ids to showing data  in input box
    let contact_details_input_ids = ['address_input', 'gmap_input', 'phone_input', 'mail_input', 'facebook_input', 'instagram_input', 'twitter_input', 'iframe_input'];

    let iframe = document.getElementById('iframe');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        contact_data = JSON.parse(this.responseText);
        contact_data = Object.values(contact_data);
        // console.log("-----------------------------------------");
        //console.log(contact_data);
        for (i = 0; i < contacts_details_ids.length; i++) {
            document.getElementById(contacts_details_ids[i]).innerText = contact_data[i + 1];
        }

        iframe.src = contact_data[8];

        contact_input_data_value(contact_data);

        for (i = 0; i < contact_details_input_ids.length; i++) {
            document.getElementById(contact_details_input_ids[i]).value = contact_data[i + 1];
        }

    }
    xhr.send('get_contact_data');

}

//this function is used for get contact data values for all input field    
function contact_input_data_value(data) {
    let contact_details_input_ids = ['address_input', 'gmap_input', 'phone_input', 'mail_input', 'facebook_input', 'instagram_input', 'twitter_input', 'iframe_input'];
    for (i = 0; i < contact_details_input_ids.length; i++) {
        document.getElementById(contact_details_input_ids[i]).value = data[i + 1];
    }
}
//this function is used for prevent submit without data 
contact_details_form.addEventListener('submit', function (e) {
    e.preventDefault();
    update_contact_details();
});

//this data is used for update contact details
function update_contact_details() {
    let index = ['address', 'gmap', 'phone_no', 'mail', 'facebook', 'twitter', 'instagram', 'iframe'];

    let contact_details_input_ids = ['address_input', 'gmap_input', 'phone_input', 'mail_input', 'facebook_input', 'instagram_input', 'twitter_input', 'iframe_input'];

    let data_str = "";

    for (i = 0; i < index.length; i++) {
        data_str += index[i] + "=" + document.getElementById(contact_details_input_ids[i]).value + '&';

    }

    data_str += "update_contact_details";
    //console.log(data_str);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //hide the edit modal form
        var myModal = document.getElementById('contactSetting');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert_msg('success', 'Data Changes');
            get_contact_data();
        } else {
            alert_msg('danger', 'No Data Changes');
        }

    }
    xhr.send(data_str);

}

management_team_form.addEventListener('submit', function (e) {
    e.preventDefault();

    add_member();

});

function add_member() {
    let data = new FormData();
    data.append('name', member_name_input.value);
    data.append('picture', member_picture_input.files[0]);
    data.append('add_member', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    //xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        //hide the  member-details form
        var myModal = document.getElementById('managementTeam');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert_msg('error', 'Only JPG JPEG and PNG format allowed.');
            member_picture_input.value = "";
        } else if (this.responseText == 'inv_size') {
            alert_msg('error', 'Please Upload File Less than 2mb.');
            member_picture_input.value = "";
        } else if (this.responseText == 'upd_failed') {
            alert_msg('error', 'Image Upload Failded');

        } else {
            alert_msg('success', 'New Member Added');
            member_name_input.value = "";
            member_picture_input.value = "";
            get_management_data();
        }

    }
    xhr.send(data);
}
function get_management_data() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        document.getElementById('team-data').innerHTML = this.responseText;

    }
    xhr.send('get_management_data');

}
function detele_member_data(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert_msg('success', 'Member Deleted');
            get_management_data();
        } else {
            alert_msg('error', 'Data Not Deleted');
        }


    }
    xhr.send('detele_member_data=' + val);
}

window.onload = function () {
    get_general_data();
    get_contact_data();
    get_management_data();
}

$(document).ready(function () {
    //console.log("Page Ready");
    /*$.ajax({
        url:"ajax/setting_crud.php",
        type:"POST",
        success:function(data){
            console.log(data);
            g_data=JSON.parse(data);
            console.log(g_data);

            $('#site_title').text(g_data.site_title);
            $('#site_about').text(g_data.site_about);

        }
    });*/

    //$('#response_msg').fadeOut(5000);
});
