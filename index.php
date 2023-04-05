<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="margin: 50px;">

    <script type="text/javascript">
		// Refresh page every 5 seconds
		setInterval(function() {
			location.reload();
		}, 5000);
	</script>

    <h1> List of users </h1>
    <br>s
    <table class="table">
        <thead>
            <tr> 
                <th>Logging time</th>
                <th>Lastname</th>
                <th>Firstname</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "test";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM sensordata";
            $result = $connection->query($sql);

            if (!$result){
                die("Invalid query: " . $connection->error);
            }

            while($row = $result->fetch_assoc()){
                echo "<tr> 
                <td>". $row["Humidity"] ."</td>
                <td>". $row["Temperature"] ."</td>
                <td>". $row["Light"] ."</td>
                </tr>";

            }

            
            ?>
        </tbody>
    </table>

</body>
</html>