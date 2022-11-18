function showProvince() { }

function loadProvinces() {
    console.log("loading");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("selectProvince").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getprovince.php?q=", true);
    xmlhttp.send();
}