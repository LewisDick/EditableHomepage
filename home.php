<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta content="width=device-width" name="viewport" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet">
    <script type="text/javascript" src="Script.js"></script>
	<link rel="icon" type="image/png" href="favcon.png">
	<?php
    $bg = array('1.png', '2.png', '3.png', '4.png'); // array of filenames

    $jsonNames = $_COOKIE["names"];
    $tempNames = str_replace("\\", "", $jsonNames);
    $names = json_decode($tempNames, true);
  
    $jsonLinks = $_COOKIE["links"];
    $tempLinks = str_replace("\\", "", $jsonLinks);
    $links = json_decode($tempLinks, true);

    $i = rand(0, count($bg)-1); // generate random number size of the array
    $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
    ?>
    <?php 
        if($_COOKIE["cssShade"] == "dark") {
        echo '<link rel="stylesheet" type="text/css" href="dark-css.css">';
            
        }
    ?>
	<style type="text/css">
        #background-image{
            background-image: url(<?php echo $_COOKIE["bg"]; ?>);
        }

    </style>
    <script>
        function work(pos){
            var changeInPos = pos;
            var image = document.getElementById('posterImage');

            image.style.marginLeft = changeInPos + 'px';
        }
    </script>
</head>
<body>
<?php
    if($_COOKIE["cookieWarning"]){

    } else {
        echo '<div id="cookieWarning"><span>We use cookies to allow you to customize the website. <a href="cookies.html">Learn More</a></span><div class="button" onclick="cookieWarning()">Got it!</div></div>';
    }
?>
<div id="edit-option" class="noselect" onclick="theFunction()">edit</div>
<div id="background-image"></div>
<div id="contents">
        <div id="edit-box"  style="display:;">
        <div id="options-header"><h2>Options Menu</h2><div id="exit" onclick="closeOptions()">╳</div></div>
            <div id="edit-column">
                <h3>Name</h3>
                <form>
                    <?php 
                        for ($i = 0; $i < 20; $i++) {
                        echo '<input type="text" class="webname" name="names" value="'; echo $names[$i]; echo '"placeholder="Site Name"'; echo '" id="name'; echo $i; echo '">';
                            echo "\r\n";
                        }
                    ?>
                </form>
            </div>
            <div id="edit-column">
                <h3>Link</h3>
                <form>
                    <?php 
                        for ($i = 0; $i < 20; $i++) {
                        echo '<input type="text" class="webname" name="names" value="'; echo $links[$i]; echo '" placeholder="Site Link"'; echo '" id="link'; echo $i; echo '">';
                            echo "\r\n";
                        }
                    ?>
                </form>
            </div>
            <form>
                <input type="text" class="webname" name="bg" id="bg" placeholder="Background link" value="<?php echo $_COOKIE["bg"]; ?>">
            </form>
            <form>
                <input type="radio" class="radio" name="gender" value="male" id="light"><label for="light">Light Theme</label>
                <br>
                <input type="radio" class="radio" name="gender" value="female" id="dark"><label for="dark">Dark Theme</label>
            </form>
            <form>
                <input id="imagePos" type="range" name="points" min="-468" max="0" value="<?php echo $_COOKIE["imagePos"]; ?>" oninput="work(this.value)">
            </form>
            <div onclick="save()" id="save" class="noselect">save</div>
        </div>
        <div id="darken"></div>
        <div id="main">
            <form id="searchForm" method="get" target="" action="https://google.com/search"> 
                <input id="searchInput" type="Search" autocomplete="off" name="q" autofocus although placeholder=""/>
            </form>
            <div class="clear"></div>
            <ul class="links">
                <?php 
                    for ($x = 0; $x < 10; $x++) {
                    echo '<li class="link"><a href="https://'; echo $links[$x]; echo '">'; echo $names[$x]; echo '</a></li>';
                        echo "\r\n";
                    }
                ?>
            </ul>
            <div class="clear"></div>
            <ul class="links">
                <?php 
                    for ($x = 10; $x < 20; $x++) {
                    echo '<li class="link"><a href="https://'; echo $links[$x]; echo '">'; echo $names[$x]; echo '</a></li>';
                        echo "\r\n";
                    }
                ?>
            </ul>
            <div class="image"><img id="posterImage" style="margin-left:<?php echo $_COOKIE["imagePos"]; ?>px;" src="<?php echo $_COOKIE["bg"]; ?>"/></div>
        </div>
</div>
</body>
</html>