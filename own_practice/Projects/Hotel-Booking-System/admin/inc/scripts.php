<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    function alert_msg(type, msg, position = 'body') {
        let bs_class = (type == 'success') ? "alert-success" : "alert-danger";
        let element = document.createElement('div');
        element.innerHTML = `
                <div class="alert ${bs_class} alert-dismissible fade show " role="alert" id='response_msg'>
                    <strong>${msg}</strong>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
        `;

        if (position == 'body') {
            document.body.append(element);
            element.classList.add('custom-alert');
        }else{
            document.getElementById(position).appendChild(element);
        }



        //document.body.append(element);

        setTimeout(removeAlert, 2000);

    }

    function removeAlert() {
        document.getElementsByClassName('alert')[0].remove();
    }

    function setActive() {
        let navbar = document.getElementById('dashboard-menu');
        let a_tag = navbar.getElementsByTagName('a');

        for (i = 0; i < a_tag.length; i++) {
            let file = a_tag[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if (document.location.href.indexOf(file_name) >= 0) {
                a_tag[i].classList.add('active');
            }
        }

    }
    setActive();
</script>