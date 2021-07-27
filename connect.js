// Utility Globals
let formFlag = 0, formError = 0;

// RegEx Variables
let gctMail  = new RegExp(/^[a-z]{4}\.([0-9]{4}L[0-9]{2}|[0-9]{4}[0-9]{3})@gct\.ac\.in$/);
let passwd   = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/);
let register = new RegExp(/^[0-9]{4}L[0-9]{2}$|^[0-9]{4}[0-9]{3}$/);

$(document).ready(function() {

    $('#rpasswdText').hover(function() {
        $(this).html('Minimum of 8 characters with alteast one lowercase, uppercase, number and special character');
    },  function() {
        $(this).html('See Example');
    });

    $('#loginForm').submit(function(e){
        let Login = 0;
        e.preventDefault();
       $.ajax({
            url: 'login.php',
            type: 'POST',
            async: false,
            data: $(this).serialize(),
            success: function(output){
                Login = JSON.parse(output);
            },
            error: function(status, error){
                alert(status + ' ' + error);
            }
       }); 
       if(Login.status) {
            $('#lusername').attr('class', 'form-control border border-success');
            $('#lpasswd').attr('class', 'form-control border border-success');
            $('#loginMsg').css('visibility', 'hidden');
            
            // Pass login variables to url
            $(location).attr('href', './index.php?status=' + Login.status + '&fname=' + Login.fname + '&lname=' + Login.lname + '&cid=' + Login.cid);
       }    else    {
            $('#lusername').attr('class', 'form-control border border-danger');
            $('#lpasswd').attr('class', 'form-control border border-danger');
            $('#loginMsg').css('visibility', 'visible');
       }
    });

    $('#registerForm').submit(function(e){
        let Register = 0;
        e.preventDefault();
        $.ajax({
            url: 'register.php',
            type: 'POST',
            async: false,
            data: $(this).serialize(),
            success: function(output){
                Register = JSON.parse(output);
            },
            error: function(status, error){
                alert(status + ' ' + error);
            }   
        });
        formTransfer();
        if(Register.status) {
            $('#registerMsg').attr('class', 'my-2 text-center text-success');
            $('#registerMsg').html('Registration Successful');
        }   else    {
            $('#registerMsg').attr('class', 'my-2 text-center text-danger');
            $('#registerMsg').html('Already Registered');
        }
    });

    $('#Connect-Page').hide();
    $('#registerForm').hide();
    $('#Connect-Page').fadeIn(1500);

});

function formTransfer() {
    $('#Connect-Page').hide();
    $('#Connect-Page').fadeIn(1500);
    if (formFlag == 0) {
        $('#registerForm').fadeIn(1500);
        $('#loginForm').hide();
        formFlag = 1;
    } else {
        $('#loginForm').fadeIn(3000);
        $('#registerForm').hide();
        formFlag = 0;
    }
}

function rightField(idname) {
    $(idname).attr('class', 'form-control border border-success');
    $(idname + 'Text').hide();
}

function wrongField(idname, message) {
    $(idname).attr('class', 'form-control border border-danger');
    $(idname + 'Text').attr('class', 'form-text text-danger');
    $(idname + 'Text').html('&nbsp;&nbsp;' + message);
    $(idname + 'Text').show();
}

function Validation() {
    formError = 0;
    if(!register.test($('#register').val())) {
        wrongField('#register', 'Invalid Regiser'); formError = 0;
    }   else {
        rightField('#register');    ++formError;
    }   
    if(!gctMail.test($('#rusername').val())) {
        wrongField('#rusername', 'Invalid Email');  formError = 0;
    }   else {
        rightField('#rusername');   ++formError;
    }
    if(!$('#rusername').val().includes($('#register').val()))  {
        $('#regLegend').attr('class', 'text-center text-danger');
        $('#regLegend').html('Register and Email Unmatched');
        formError = 0;
    }   else {
        $('#regLegend').attr('class', 'text-center text-success');
        $('#regLegend').html('Welcome, New User');
        ++formError;
    } 
    if(!(/^[a-zA-Z0-9]+$/).test($('#fname').val())) {
        wrongField('#fname', 'Invalid Name');   formError = 0;
    }   else {
        rightField('#fname');   ++formError;
    }
    if(!(/^[a-zA-Z0-9]*$/).test($('#lname').val())) {
        wrongField('#lname', 'Invalid Name');   formError = 0;
    }   else {
        rightField('#lname');   ++formError;
    }
    if(!passwd.test($('#rpasswd').val())) {
        wrongField('#rpasswd', 'Weak Password');    formError = 0;
    }   else {
        rightField('#rpasswd'); ++formError;
    }   
    if(!passwd.test($('#cpasswd').val()) || $('#cpasswd').val() != $('#rpasswd').val()) {
        wrongField('#cpasswd', 'Incorrect Password');   formError = 0;
    }   else {
        rightField('#cpasswd'); ++formError;
    }   
    if(formError == 7)  return true;    
    return false;
}

function releaseHidden() {
    $('div').removeAttr('hidden');
}

function fieldTracer() {
    let X = $('#fname').val(), Y = $('#lname').val(), Z = $('#regLegend').html();
    if (X.length > 0 || Y.length > 0) {
        $('#regLegend').html("Welcome, " + X + " " + Y);
    } else {
        $('#regLegend').html("Welcome New User");
    }
}