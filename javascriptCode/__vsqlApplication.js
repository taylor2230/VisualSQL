class buildQuery{
    constructor(field){
        this.field = field;
    }
    array(x){
        this.elements = x;
        if(this.elements !== null) {
            this.list = this.elements.split(',');
            if (this.list.indexOf(this.field) === -1) {
                this.addToList();
            } else {
                this.removeFromList();
            }
        } else {
            this.list = [this.field];
        }
        return this.list.toString();
    }
    addToList(){
        this.list.push(this.field);
    }
    removeFromList(){
        this.list.splice(this.list.indexOf(this.field),1);
    }
}

class sendRequest{
    constructor(element, request) {
        this.htmlElement = element;
        this.paramRequest = request;
    }
    request(x){
        const files = ["./phpCode/__vsqlLoader.php?val=", "./phpCode/accessData.php?val="];
        this.typeOfRequest = x;
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.id = this.htmlElement;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                if(this.responseText.split('"')[1] !== 'failed'){
                    document.getElementById(this.id).innerHTML = this.responseText;
                } else {
                    document.getElementById('failure').innerHTML = this.responseText;
                }
            }
        };
        xmlhttp.open("GET", files[this.typeOfRequest] + this.paramRequest,true);
        xmlhttp.send();
    }
}

class requestTables{
    //request selected database's tables
    constructor(element, parameter) {
        this.htmlElement = element;
        this.credentials = parameter;
    }
    sendRequest(){
        let ajax  = new sendRequest(this.htmlElement, this.credentials);
        ajax.request(1);
    }
}

class requestFields{
    //request selected tables fields
    constructor(element, parameter){
        this.htmlElement = element;
        this.credentials = parameter;
    }
    sendRequest(){
        let ajax = new sendRequest(this.htmlElement, this.credentials);
        ajax.request(1);
    }
}

class requestReport{
    //request selected fields' data
    constructor(element, parameter){
        this.htmlElement = element;
        this.credentials = parameter;
    }
    sendRequest(){
        let ajax = new sendRequest(this.htmlElement, this.credentials);
        ajax.request(1);
    }
}