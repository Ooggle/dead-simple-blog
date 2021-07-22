<script src="<?php echo $config['rooturl'] ?>assets/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?skin=desert"></script>
<script>
    /* mobile navbar */
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });

    /* dropdown */
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {"constrainWidth": false});
    });

    /* tooltips */
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.tooltipped');
        var instances = M.Tooltip.init(elems);
    });

    /* Floating Action Button */
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems);
    });

    /* go to top button */
    document.getElementById("go-to-top-button").addEventListener('click', function() {
        topFunction();
    });

    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("top-navbar").style.top = "0";
        } else {
            if(window.pageYOffset > 300) {
                document.getElementById("top-navbar").style.top = "-65px";
            }
        }
        
        if(window.pageYOffset < 300) {
            document.getElementById("go-to-top-button").style.bottom = "-100px";
        }
        else {
            document.getElementById("go-to-top-button").style.bottom = "23px";
        }
        prevScrollpos = currentScrollPos;
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
	
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(cname, cvalue) {
        var d = new Date();
        d.setTime(d.getTime() + (365*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function switch_dark_white()
    {
        if(dark == 0)
        {
            setCookie("dark-mode", 1);
            dark = 1;

            var item = document.getElementById("theme-style"); 
            item.parentNode.removeChild(item);
            var item = document.getElementById("markdown-style"); 
            item.parentNode.removeChild(item);

            var node = document.createElement("link");
            node.rel = "stylesheet";
            node.href = "<?php echo $config['rooturl'] ?>assets/css/style-dark-specific.css";
            node.id = "theme-style"
            document.head.appendChild(node);
            var node = document.createElement("link");
            node.rel = "stylesheet";
            node.href = "<?php echo $config['rooturl'] ?>assets/css/github-markdown-dark.css";
            node.id = "markdown-style"
            document.head.appendChild(node);

            document.getElementById("theme-switch-button").innerHTML = "brightness_7";
        }
        else
        {
            setCookie("dark-mode", 0);
            dark = 0;

            var item = document.getElementById("theme-style"); 
            item.parentNode.removeChild(item);
            var item = document.getElementById("markdown-style"); 
            item.parentNode.removeChild(item);

            var node = document.createElement("link");
            node.rel = "stylesheet";
            node.href = "<?php echo $config['rooturl'] ?>assets/css/style-white-specific.css";
            node.id = "theme-style"
            document.head.appendChild(node);
            var node = document.createElement("link");
            node.rel = "stylesheet";
            node.href = "<?php echo $config['rooturl'] ?>assets/css/github-markdown.css";
            node.id = "markdown-style"
            document.head.appendChild(node);

            document.getElementById("theme-switch-button").innerHTML = "brightness_3";
        }
        
    }

    var dark = getCookie("dark-mode");
    if(dark == "0")
    {
        dark = 0;
    }
    else if (dark == "" || dark == "1") {
        dark = 1;
    }
    else
    {
        dark = 1;
    }

    /* footer */

    if(document.body.scrollHeight < window.innerHeight) {
        document.body.style.minHeight = "100vh";
        document.getElementById("page-footer").style.position = "absolute";
        document.getElementById("page-footer").style.bottom = "0px";
    }

</script>
