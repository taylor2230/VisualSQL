class sendRequest {
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
class processRequest{
    constructor(x, array) {
        this.requested = x;
        this.array = array;
    }
    processor(){
        if(this.requested === 1){
            this.buildIt('create');
        } else if(this.requested === 2){
            this.buildIt('delete');
        }
    }
    buildIt(requested){
        let param = "";
        for(let i = 0;i<this.array.length;i++){
            param += i === 0 ? this.array[i] : ' ' + this.array[i];
        }
        let sender = new sendRequest('response', param);
        sender.request(requested);
    }
}

function passInfo(x){
    //pass information to updated password for user account
    function buildRequest(y) {
        let elements = [];
        if (y === 1) {
            elements.push(document.getElementById('current-user').innerHTML);
            elements.push(document.getElementById('pass').value);
            elements.push(document.getElementById('user-2').value + '~' + document.getElementById('pass-3').value);
            return elements;
        } else if (y === 2) {
            elements.push(document.getElementById('current-user').innerHTML);
            elements.push(document.getElementById('pass').value);
            elements.push(document.getElementById('user').value);
            return elements;
        }
    }
    let a = buildRequest(x);
    let requestBuilder = new processRequest(x, a);
    requestBuilder.processor();
}