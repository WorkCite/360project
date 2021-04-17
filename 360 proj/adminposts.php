<!DOCTYPE html>
<html lang="en">


<head>
    <link rel="stylesheet" href="./css/admin.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <title>Admin control</title>
    <link rel="stylesheet" href="./css/home.css">
    <script type="text/javascript" language="javascript">
		var xmlHttp;  
		function createXMLHttpRequest(){ 
			if(window.ActiveXObject){  
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");  
			}  
			else if(window.XMLHttpRequest){  
				xmlHttp = new XMLHttpRequest();  
			}  
		}  
		function foo(n){  
			createXMLHttpRequest();  
			var url="deletepost.php";  
			xmlHttp.open("POST",url,true); 
			xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlHttp.onreadystatechange = callback;  
			xmlHttp.send("action=" + n.value); 
		}  
		function callback(){  
			if(xmlHttp.readyState == 4){  
				if(xmlHttp.status == 200){  
					alert(xmlHttp.responseText);
          location.reload();   
				}  
			}  
		}
</script>
</head>

<body>
<?php
    session_start();

    $host = "localhost";
    $database = "360project";
    $user = "webuser";
    $password0 = "P@ssw0rd";
    $connection = mysqli_connect($host, $user, $password0, $database);
    $error = mysqli_connect_error();
    if($error != null)
    {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
    }
    else
    {
        //good connection, so do you thing
        if (isset($_SERVER['HTTP_REFERER']))
          $rlink = $_SERVER['HTTP_REFERER'];

        //sql error
        //$sql = "SELECT * from users where username = '".$_SESSION['user']."'";
        
        $name=$_GET['username'];
        echo $name;

        $sql = "SELECT * FROM post WHERE username = $name;";

        $results = mysqli_query($connection, $sql);
        echo  "<div class='table'>";
        echo "<table>";
        while($row = mysqli_fetch_assoc($results)){
          if($row != null){
            echo "<tr><td> " . $row['postid'] . "</td><td>" . $row['content'] . "</td><td>" . $row['img'] . "</td><td>" . $row['date'] . "</td><td><button type='button' class='btn' id='button' onclick='foo(this)'  value=" .$row['postid'] . ">delete</button></td></tr>";
          }
        }
        echo  "</div>";
        echo "</table>";
      }

 




    ?>

        <footer>
        <div class="copyright">
            <p>Copyright © WorkCite Github student group</p>
        </div>
    </footer>
</body>
</html>
