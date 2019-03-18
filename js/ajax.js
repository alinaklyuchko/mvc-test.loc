"use strict";

    document.addEventListener('DOMContentLoaded', function () {
        var content = document.querySelector(".content");
        content.addEventListener('click', function(e){
            var target = e.target; // где был клик?
              if (target.tagName == 'A') {
                e.preventDefault();
                var url = target.getAttribute('data-url');
                var page = target.getAttribute('data-page');
                var formData = new FormData();
                formData.append('page', page);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", url);
                xhr.send(formData);
                xhr.addEventListener('readystatechange', function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                       content.innerHTML = this.responseText;
                    };
                });

            };
        });
    });
