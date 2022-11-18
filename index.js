loadProvinces();

function showProvince(str) {
    if (str == "") {
        document.getElementById("showAdvance").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("showAdvance").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "showadvance.php?q=" + str, true);
    xmlhttp.send();
}


function loadProvinces() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("selectProvince").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getprovince.php?q=", true);
    xmlhttp.send();
}