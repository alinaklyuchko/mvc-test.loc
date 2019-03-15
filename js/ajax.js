var xhr = new XMLHttpRequest();

xhr.open('GET', 'http://mvc-test.loc/employes', true);

xhr.send(); // (1)

xhr.onreadystatechange = function() { // (3)
    if (xhr.readyState != 4) return;



    if (xhr.status != 200) {
        alert(hello);
    } else {
        alert();
    }

}
