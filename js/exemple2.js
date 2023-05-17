let link = document.getElementById("link1");
let form = document.getElementById("form1");

function linkEvent(event) {
    event.preventDefault ? event.preventDefault() : event.returnValue = false;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.addEventListener("readystatechange", function(event) {
        if(xmlhttp.readyState == 4) {
            if(xmlhttp.status == 200) {
                let div = document.getElementById("result1");
                div.innerHTML = xmlhttp.responseText;
            } else {
                alert("error code " +xmlhttp.status+" : " +xmlhttp.statusText);
            }
        }
    });

    xmlhttp.open("GET", link.href, true);
    xmlhttp.send();
}

function formEvent(event) {
    event.preventDefault();

    if(!form.note_classique.value) {
        let div = document.getElementById("resultat");
        div.innerHTML = "Aucune note choisie !";
        return;
    }

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.addEventListener("readystatechange", function(event) {
        if(xmlhttp.readyState == 4) {
            if(xmlhttp.status == 200) {
                let div = document.getElementById("resultat");
                div.innerHTML = xmlhttp.responseText;
            } else {
                alert("error code " +xmlhttp.status+" : " +xmlhttp.statusText);
            }
        }
    });

    xmlhttp.open("POST", form.action, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send("note_classique=" +form.note_classique.value);
}

link.addEventListener("click", linkEvent);
form.addEventListener("submit", formEvent);