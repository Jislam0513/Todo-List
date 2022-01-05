function jsfunction(error){
    document.getElementById("errorHandler").innerHTML = error;
}
function check(){
    let fName = document.getElementById("fName").value;
    let lName = document.getElementById("lName").value;
    let email = document.getElementById("email").value;

    if(fName==="" || lName==="" || email===""){
        document.getElementById("result").innerHTML = "Fields can not be empty";
        alert("Fields can not be empty");
        return false;
    }
    if(/\d/.test(fName)){
        document.getElementById("result").innerHTML = "First Name can not contain Numbers";
        alert("First Name can not contain Numbers");
        return false;
    }
    if(/\d/.test(lName)){
        document.getElementById("result").innerHTML = "Last Name can not contain Numbers";
        alert("Last Name can not contain Numbers");
        return false;
    }
    let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!re.test(email)){
        document.getElementById("result").innerHTML = "Not a valid email";
        alert("Not a valid email");
        return false;
    }
    alert("Sign up Successful");
    document.getElementById("result").innerHTML = "Sign up Successful";
    return false;

}
function ajaxFunction1(){
    var ajaxRequest;  // The variable that makes Ajax possible!
    try {
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    }catch (e) {
        // Internet Explorer Browsers
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e) {
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }catch (e){
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            var ajaxDisplay = document.getElementById('ajaxDiv');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }
    var sort = document.getElementById('sort').value;
    var queryString = "?sort=" + sort;
    ajaxRequest.open("GET", "./task_ajax.php" + queryString, true);

    ajaxRequest.send(null);
}

function ajaxFunction2(){
    var ajaxRequest;  // The variable that makes Ajax possible!
    try {
        ajaxRequest = new XMLHttpRequest();
    }catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e) {
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }catch (e){
                alert("Your browser broke!");
                return false;
            }
        }
    }
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            var ajaxDisplay = document.getElementById('div1');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }
    var taskID = document.getElementById('taskID1').value;
    var queryString = "?taskID=" + taskID;
    //ajaxRequest.open("GET", "./edit_task_form.php" + queryString, true);
    //ajaxRequest.send(null);
}