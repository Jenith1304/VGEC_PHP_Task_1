//for zip Code Validation
function isIndianZipCode(str) {
    return /(^\d{6}$)/.test(str);
}

function validateInput() {
    let zipCode = document.getElementById("zipCode").value;
    let message = "";
    if (isIndianZipCode(zipCode)) {
        message = "Valid Zip Code";
    } else {
        message = "Invalid Zip Code";
    }
    document.getElementById("msg").innerHTML = message;
}
//for mobile number validation
function ValidateMobileNumber() {
    var mobileNumber = document.getElementById("txt_pno").value;
    var lblError = document.getElementById("lblError");
    lblError.innerHTML = "";
    var expr = /^(0|91)?[6-9][0-9]{9}$/;
    if (!expr.test(mobileNumber)) {
        lblError.innerHTML = "Invalid Mobile Number.";
    }
}
