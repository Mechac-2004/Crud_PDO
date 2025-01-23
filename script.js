function update(id) {
    var xmlhtpp = new XMLHttpRequest();
    xmlhtpp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var tache = JSON.parse(this.responseText);
            document.getElementById("title").value = convert(tache.title);
            document.getElementById("description").value = convert(tache.description);
            document.getElementById("date").value = tache.date;
            document.getElementById("id").value = tache.id;
            document.getElementById("btn_update").value = 'update';
            document.getElementById("btn_update").innerHTML = 'Mettre A Jour';
        }
    };
    var routeUrl = 'traitement.php?getUpdate='+id;
    xmlhtpp.open("GET",routeUrl,true);
    xmlhtpp.send();
}

function convert(text){
    return text.replace(/&amp;#039;/g, "'")
    .replace(/&amp;agrave;/g, "à")
    .replace(/&#039;/g, "'")
    .replace(/&agrave;/g, "à")
    .replace(/&acirc;/g, "â")
    .replace(/&#13;/g, "\r")
    .replace(/&#10;/g, "\n")
    .replace(/&#9;/g, "\t");
}