        var hidden = true;
        var names = [20];
        var links = [20];
        var bg = "";
        var cssShade = "";

        function theFunction() {
            var editb = document.getElementById('edit-option');
            var option = document.getElementById('edit-box');
            if (hidden != true) {
                option.style.left = "-500px";
                document.getElementById('darken').style.opacity = 0;
                hidden = true;
            } else {
                option.style.left = "0";
                document.getElementById('darken').style.opacity = 0.3;
                hidden = false;
            }
        }
        function cookieWarning() {
            var warning = document.getElementById('cookieWarning');
            var accept = "accepted";
            warning.style.top = '-5vh';
            setCookie('cookieWarning', accept);
            window.setTimeout(hide,1000);
        }

        function hide() {
            var warning = document.getElementById('cookieWarning');
            warning.style.visibility = "hidden";
        }


        function closeOptions() {
            var options = document.getElementById('edit-box');
            options.style.left = "-500px";
            document.getElementById('darken').style.opacity = 0;
            hidden = true;
        }

        function setCookie(name, value) {
                document.cookie = name + "=" + value + "; expires=Thu, 2 Jan 2020 12:00:00 UTC; path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length,c.length);
            }
        }
        return "";
        }

        function save(){
            for(i = 0; i < 20; i++) {
                names[i] = document.getElementById("name" + i).value;
                
            }
            for(i = 0; i < 20; i++) {
                links[i] = document.getElementById("link" + i).value;
                
            }

            var imagePos = document.getElementById("imagePos").value;
            console.log(imagePos);
            bg = document.getElementById("bg").value;

            if(document.getElementById("light").checked){
                cssShade = "light";
            } else if (document.getElementById("dark").checked){
                cssShade = "dark";
            } else {
                cssShade = "light";
            }

            setCookie('imagePos', imagePos);
            setCookie('names', JSON.stringify(names));
            setCookie('links', JSON.stringify(links));
            setCookie('cssShade', cssShade);
            setCookie('bg', bg);
            location.reload();


        }