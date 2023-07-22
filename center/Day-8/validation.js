 function nameValidation(){
            var name=document.getElementById('name').value;
            var nameRegex=/^[a-zA-Z ]{3,20}$/;
            if(name==""||name==null){
                document.getElementById('nameErr').innerHTML='Name must be not null';
                document.getElementById('btn').disabled=true;
                document.getElementById('name').classList.add('is-invalid');
                document.getElementById('nameErr').classList.add('error-msg'); 

            }
            else if (nameRegex.test(name)){
                document.getElementById('nameErr').innerHTML='';
                document.getElementById('btn').disabled=false;
                document.getElementById('name').classList.remove('is-invalid');
                document.getElementById('nameErr').classList.remove('error-msg'); 

            }else{
                document.getElementById('nameErr').innerHTML='Invalid Name (Name Should contain alphabet 3-20 Char.)';
                document.getElementById('btn').disabled=true;
                document.getElementById('name').classList.add('is-invalid');
                document.getElementById('nameErr').classList.add('error-msg'); 

            }
        }
function emailValidation(){
        var email=document.getElementById('email').value;
        var emailRegEx=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{3,}))$/;
        if(email==""||email==null){
                document.getElementById('emailErr').innerHTML='Email must be not null';
                document.getElementById('btn').disabled=true;
                document.getElementById('email').classList.add('is-invalid');
                document.getElementById('emailErr').classList.add('error-msg'); 

            }
        else if(emailRegEx.test(email)){
            document.getElementById('emailErr').innerHTML='';
            document.getElementById('btn').disabled=false;
            document.getElementById('email').classList.remove('is-invalid');
            document.getElementById('emailErr').classList.remove('error-msg'); 


        }else{
            document.getElementById('emailErr').innerHTML='Invalid Email Address';
            document.getElementById('btn').disabled=true;
            document.getElementById('email').classList.add('is-invalid');
            document.getElementById('emailErr').classList.add('error-msg'); 

        }
    }
function phoneValidation(){
            var phone=document.getElementById('phone').value;
            //console.log(phone);
            if(phone==""||phone==null){
                document.getElementById('phoneErr').innerText='Phone number must be not null.';
                document.getElementById('btn').disabled=true;
                document.getElementById('phone').classList.add('is-invalid');
                document.getElementById('phoneErr').classList.add('error-msg'); 


            }
            else if(phone.length==10){
                console.log('ok')
                //check first number is 9,8,7,6
                if(phone.substr(0,1)=='6'||phone.substr(0,1)=='7'||phone.substr(0,1)=='8'||phone.substr(0,1)=='9'){
                    document.getElementById('phoneErr').innerText='';
                    document.getElementById('btn').disabled=false;
                    document.getElementById('phone').classList.remove('is-invalid');
                    document.getElementById('phoneErr').classList.remove('error-msg'); 

                }else{
                     document.getElementById('phoneErr').innerText='Invaild Phone Number';
                     document.getElementById('btn').disabled=true;
                     document.getElementById('phone').classList.add('is-invalid');
                     document.getElementById('phoneErr').classList.add('error-msg'); 

                }
                //check if it exceed 10 digits.
            }else if(phone.length>10) {
                document.getElementById('phoneErr').innerText='Maximum 10 Digits Allowed.';
                document.getElementById('btn').disabled=true;
                document.getElementById('phone').classList.add('is-invalid');
                document.getElementById('phoneErr').classList.add('error-msg'); 

            }else{
                document.getElementById('phoneErr').innerText='Phone number should be 10 digits.';
                document.getElementById('btn').disabled=true;
                document.getElementById('phone').classList.add('is-invalid');
                document.getElementById('phoneErr').classList.add('error-msg'); 

            }
        } 
function ageValidation(){
            var age=parseInt(document.getElementById('age').value);
            if(age==''||age==null){
                document.getElementById('ageErr').innerHTML="Age Must be Not Null.";
                document.getElementById('btn').disabled=true;
                document.getElementById('age').classList.add('is-invalid');
                document.getElementById('ageErr').classList.add('error-msg'); 

            }
            else if(age>=18 && age<=45){
                document.getElementById('ageErr').innerHTML="";
                document.getElementById('btn').disabled=false;
                document.getElementById('age').classList.remove('is-invalid');
                document.getElementById('ageErr').classList.remove('error-msg'); 


            }else{
                document.getElementById('ageErr').innerHTML="Age must be 18 to 45.";
                document.getElementById('btn').disabled=true;
                document.getElementById('age').classList.add('is-invalid');
                document.getElementById('ageErr').classList.add('error-msg'); 


            }
        } 
        
function pinValidation(){
            var pin=document.getElementById('pin').value;
            var pinRegex=/^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/;
            if(pin==''||pin==null){
                document.getElementById('pinErr').innerText='Pin must be not null';
                document.getElementById('btn').disabled=true;
                document.getElementById('pin').classList.add('is-invalid');
                document.getElementById('pinErr').classList.add('error-msg');


            }
            else if(pinRegex.test(pin)){
                document.getElementById('pinErr').innerText='';
                document.getElementById('btn').disabled=false;
                document.getElementById('pin').classList.remove('is-invalid');
                document.getElementById('pinErr').classList.remove('error-msg');

            }else{
                document.getElementById('pinErr').innerText='Invaid Pin';
                document.getElementById('btn').disabled=true;
                document.getElementById('pin').classList.add('is-invalid');
                document.getElementById('pinErr').classList.add('error-msg');
            }

        }        
function addressValidation(){
    var address=document.getElementById('address').value;
    if(address==''||address==null){
        document.getElementById('addressErr').innerText='Address Must be Not Null';
        document.getElementById('btn').disabled=true;
        document.getElementById('address').classList.add('is-invalid');
        document.getElementById('addressErr').classList.add('error-msg');

    }else{
        document.getElementById('addressErr').innerText='';
        document.getElementById('btn').disabled=false;
        document.getElementById('address').classList.remove('is-invalid');
        document.getElementById('addressErr').classList.remove('error-msg');
    }
}

$(document).ready(function(){
    $("#inputform").validate();
})