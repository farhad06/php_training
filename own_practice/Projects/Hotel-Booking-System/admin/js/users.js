function get_all_users() {

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/users_crud.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            //console.log(this.responseText);
            document.getElementById('users-data').innerHTML = this.responseText;

        }
        xhr.send('get_all_users');

    
}

function change_status(id, val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        if (this.responseText == 1) {
            alert_msg('success', 'User Status Changed.');
            get_all_users();

        } else {
            alert_msg('error', 'User Status not Changed.')
        }

    }
    xhr.send('change_status=' + id + '&value=' + val);

}
function remove_user(id) {
    if (confirm('Are You sure ! You Want to delete this Room?')) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/users_crud.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (this.responseText == 1) {
                alert_msg('success', 'User  Deleted');
                get_all_users();
            } else {
                alert_msg('error', 'Something went Wrong');
            }

        }
        xhr.send('remove_user=' + id);

    }
}

function search_user(username) {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users_crud.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        //console.log(this.responseText);
        document.getElementById('users-data').innerHTML = this.responseText;

    }
    xhr.send('search_user&name='+username);


}
window.onload = function () {
    get_all_users();
}