document.querySelector(".content").addEventListener("DOMContentLoaded", function (e) {
    var target = e.target; // где был клик?

    if (target.tagName == 'a') {
        e.preventDefault();
        var url = a.getAttribute('data-url');
        var page = a.getAttribute('data-page');
    }

});
var formData = new FormData();
var xhr = new XMLHttpRequest();
xhr.open("POST", "/url");
xhr.send(formData);

// var xhr = new XMLHttpRequest();
//
// xhr.open('GET', 'http://mvc-test.loc/employes', true);
//
// xhr.send(); // (1)
//
// xhr.onreadystatechange = function() { // (3)
//     if (xhr.readyState != 4) return;
//
//
//
//     // if (xhr.status != 200) {
//     //     alert(hello);
//     // } else {
//     //     alert();
//     // }
//
// }
