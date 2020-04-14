let usr;
let ps;
let dbse;
let table;
let fields;

function passInfo(){
    //process user login information and return databases
    usr = document.getElementById("log").value;
    ps = document.getElementById("pass").value;
    let sender = new sendRequest("vsql", usr + ' ' + ps);
    sender.request(0);
    setTimeout(function (){
            if(document.contains(document.getElementById('db-group'))){
                document.getElementById('vsql-login').remove();
            }
        },
     200)
}

function processDatabaseSelection(name){
    //process database selection
    dbse = name;
    let parameters = name + ' ' + usr + ' ' + ps + ' ' + 'table' + ' ' + 0 + ' ' + 0;
    let tabler = new requestTables('table', parameters);
    tabler.sendRequest();
    queryBuilderHelper(name, 'slc-db');
    let y = document.getElementById('fields');
    y.innerHTML = null;
    y.style.visibility = 'hidden';
    table = null;
}

function processTableSelection(name){
    //process table selection
    table = name;
    let parameters = dbse + ' ' + usr + ' ' + ps + ' ' + 'fields' + ' ' + name + ' ' + 0;
    let fielder = new requestFields('fields', parameters);
    fielder.sendRequest();
    queryBuilderHelper(name, 'slc-table');
    fields = null;
}

function processReport(){
    //process field selection
    if(fields === null){
        fields = '*';
    }
    let parameters = dbse + ' ' + usr + ' ' + ps + ' ' + 'data' + ' ' + table + ' ' + fields;
    let reporter = new requestReport('report', parameters);
    reporter.sendRequest();
}

function fieldBuilder(name){
    //builds fields requested for query
    let fb = new buildQuery(name);
    fields = fb.array(fields);
    queryBuilderHelper(fields, 'slc-fields');
}

function nextElementUnHide(element){
    //hides tables when not in use at original login
    function findParent(startElement){
        return startElement.parentElement;
    }
    let returnedNode = findParent(element);
    while(!returnedNode.getAttribute('id','vsql')){
        returnedNode = findParent(returnedNode);
    }
    let sibling = returnedNode.nextElementSibling;
    sibling.style.visibility = 'visible';
}

function queryBuilderHelper(name,type){
    //creates interactive query building process
    function restart(lst){
        for(let i = 0; i < lst.length;i++){
            if(document.contains(document.getElementById(lst[i]))){
                document.getElementById(lst[i]).remove();
            }
        }
        if(document.contains(document.getElementById('query-submit'))){
            document.getElementById('query-submit').remove();
        }
    }
    function buildTag(mainTag){
        let x = document.createElement('p');
        mainTag.appendChild(x);
        return x;
    }
    const section = document.getElementById('query-builder');

    if(type === 'slc-db'){
        restart(['slc-db', 'slc-table', 'slc-fields']);
        let x = buildTag(section);
        x.id = type;
        x.innerText = 'From:\n' + name;
    } else if(type === 'slc-table'){
        restart(['slc-table', 'slc-fields']);
        let y = document.getElementById('slc-db');
        let z  = y.innerText.split('.');
        y.innerText = z[0] + '.' + name;
    } else if(type === 'slc-fields'){
        restart(['slc-fields']);
        let x = buildTag(section);
        x.id = type;
        x.innerText = 'Select:\n' + name;
        let btn = document.createElement('button');
        btn.id = 'query-submit';
        btn.innerText = 'Submit Query';
        btn.setAttribute('onclick','processReport()');
        section.appendChild(btn);
    }
}