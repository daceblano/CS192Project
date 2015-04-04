function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function createaccountformhash(form, snum, password) {
     // Check each field has a value
    if (snum.value == '' ||  password.value == '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Check the student number if long enough and contains only digits
    re = /^\d+$/;
    if(!re.test(form.snum.value)) { 
        alert("Student number must contain only digits"); 
        form.snum.focus();
        return false; 
    }
    // Check the length of the student number
    if (snum.value.length < 9) {
        alert('Student numbers are 9 digits long.  Please try again');
        form.snumber.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
    return true;
}

function pressedEnter(event, form, password) {
    var x = event.keyCode;
    if (x == 13) {  // 13 is the Enter key
        formhash(form, password);
    }
}