let usr;
let ps;

function sendInfo(idval, passval){
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("vsql").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./phpCode/__vsqlLoader.php?val=" + idval + " " + passval, true);
    xmlhttp.send();
}