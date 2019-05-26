
<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Update.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <title> UPDATE SHOP DATA </title>
    </head>
    <body>
        <div class= container>
            <div align="center">
                <form method="POST" action="fetchDataToUpdate.php" >
                    <b>ID To Update:</b> <input type="text" name="id"  required><br><br>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>
</html>