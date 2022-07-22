window.addEventListener('DOMContentLoaded', init);

function init(e){
    var copyright = document.getElementById('copyright');
    copyright.innerHTML = "&copy; Migraine Diary " + new Date().getFullYear();  

    if(document.getElementById('username') != null){
        var username = document.getElementById('username');
        username.addEventListener('change', usernameValidate);
    }

    if(document.getElementById('password') != null){
        var password = document.getElementById('password');
        password.addEventListener('change', passwordValidate);
    }
    
    if(document.getElementById('password1') != null){
        var password1 = document.getElementById('password1');
        password1.addEventListener('change', password1Validate);
    }

    if(document.getElementById('date') != null){
        var date = document.getElementById('date');
        date.addEventListener('change', dateValidate);
    }

    if(document.getElementById('date') != null && document.getElementById('submit') != null){
        var onSubmit = document.getElementById('form');
        onSubmit.addEventListener('submit', dateValidate);
    }
}

function usernameValidate(e){
    var username = document.getElementById('username').value.trim();
    username = username.trim();
    var submit = document.getElementById('submit');
    var usernameError = document.getElementById('usernameError');
    submit.disabled = false;
    if(username == "" || username == null){
        usernameError.innerHTML = 'Please enter a username!';
        submit.disabled = true;
    } else{
        if(usernameError != null){
            usernameError.innerHTML = ''; 
            submit.disabled = false;
        }
        
    }
}

function passwordValidate(e){
    var password = document.getElementById('password').value;
    var submit = document.getElementById('submit');
    submit.disabled = false;
    var passwordError = document.getElementById('passwordError');
    if(password == "" || password == null){
        passwordError.innerHTML = 'Please enter a password!';
        submit.disabled = true;
    } else if(password.length < 7){
        passwordError.innerHTML = 'Password must be at least 7 characters long!';
        submit.disabled = true;
    } else if(password.search(/\d/) == -1){
        passwordError.innerHTML = 'Password must cantain at least one number!';
        submit.disabled = true;
    } else if(password.search(/[a-z]/) == -1){
        passwordError.innerHTML = 'Password must cantain at least one lower case letter!';
        submit.disabled = true;
    } else if(password.search(/[A-Z]/) == -1){
        passwordError.innerHTML = 'Password must cantain at least one upper case letter!';
        submit.disabled = true;
    } else{
        if(passwordError != null){
            passwordError.innerHTML = "";
            submit.disabled = false;
        }
    }
}

function password1Validate(e){
    var password = document.getElementById('password').value;
    var password1 = document.getElementById('password1').value;
    var submit = document.getElementById('submit');
    var password1Error = document.getElementById('password1Error');
    submit.disabled = false;
    if(password1 == "" || password1 == null){
        password1Error.innerHTML = 'Please enter password confirmation';
        submit.disabled = true;
    } else if(password != password1){
        password1Error.innerHTML = 'Passwords do not match';
        submit.disabled = true;
    } else{
        if(password1Error != null){
            password1Error.innerHTML = "";
            submit.disabled = false;
        }
    }
}

function dateValidate(e){
    var date = document.getElementById('date').value;
    var dateError = document.getElementById('dateError');
    var submit = document.getElementById('submit');
    submit.disabled = false;
    var today = new Date();
    var dateCheck = new Date(date);
    if(date == "" || date == null){
        dateError.innerHTML = 'Please enter a date!';
        submit.disabled = true;
    } else if(dateCheck > today){
        dateError.innerHTML = 'Date can only be todays date or the past!';
        submit.disabled = true;
    } else{
        if(dateError != null){
            dateError.innerHTML = "";
            submit.disabled = false;
        }
    }
}