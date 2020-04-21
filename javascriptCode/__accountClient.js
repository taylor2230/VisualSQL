class sendRequest{
    constructor(element, request) {
        this.htmlElement = element;
        this.paramRequest = request;
    }
    request(x){
        const files = "./phpCode/userProfileManagement.php?val=";
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.id = this.htmlElement;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById(this.id).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", files + this.paramRequest + ' ' + x,true);
        xmlhttp.send();
    }
}

let user;
let currentPassword;
let newPassword;

function passInfo(){
    //pass information to updated password for user account
    user = document.getElementById("current-user").innerText;
    currentPassword = document.getElementById("pass").value;
    newPassword = document.getElementById("pass-new").value;
    let pass = new sendRequest('response', user + ' ' + currentPassword + ' ' + newPassword);
    pass.request('update');
}
