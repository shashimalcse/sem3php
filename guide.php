<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
            body {font-family: Arial, Helvetica, sans-serif;
            }
            * {box-sizing: border-box;}

            input[type=text], select, textarea {
              width: 50%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 3px;
              box-sizing: border-box;
              margin-top: 6px;
              margin-bottom: 10px;
              resize: vertical;
            }
            input[type=tel], select, textarea {
              width: 50%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 3px;
              box-sizing: border-box;
              margin-top: 6px;
              margin-bottom: 10px;

            }
            input[type=email], select, textarea {
              width: 50%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 3px;
              box-sizing: border-box;
              margin-top: 6px;
              margin-bottom: 10px;
              resize: vertical;
            }
            input[type=time], select, textarea {
              border: 1px solid #ccc;
              border-radius: 3px;
              box-sizing: border-box;
              margin-top: 6px;
              margin-bottom: 10px;
              resize: vertical;
            }
            input[type=submit] {
              background-color: rgb(11, 17, 94);
              color: white;
              padding: 12px 20px;
              border: none;
              border-radius: 3px;
              cursor: pointer;
            }

            input[type=submit]:hover {
              background-color: #220969;
            }
            .imgcontainer {
              text-align: right;
              margin: 24px 0 12px 0;
              position: relative;
            }
            img.avatar {
              width: 30%;
              border-radius: 30%;
            }
            .container {
              text-align:justify;
              border-radius: 5px;
              background-color: #f2f2f29c;
              padding: 20px;
            }

            </style>
        </head>
<body>
    <h2>Guide Details</h2>
    <div class="container">
        <form class="form-group" action = "includes/guide.inc.php" method="post">
            <label for="Image"><b>Add Image</b></label><br>
            <input type="file" name="gimage" id="image" accept="image/*" required><br><br>

            <label for="FullName"><b>Full Name</b></label><br>
            <input type="text" name="gfullname"><br>

            <label for="email"><b>E-mail Address</b></label><br>
            <input type="email" name="gemail"><br>

            <label for="PhoneNumber"><b>Phone Number</b></label><br>
            <input type="tel" name="gphonenumber"><br>

            <!-- <label for="Languages"><b>Select Languages</b></label><br>
            <input type="checkbox" name=list[] value="languageGroup">
            <label>English</label><br>
            <input type="checkbox" name=list[] value="languageGroup">
            <label>Sinhala</label><br>
            <input type="checkbox" name=list[] value="languageGroup">
            <label>Tamil</label><br> -->

            <label for="time"><b>Available Time</b></label><br>
            <select name="gtime">
              <option value="1 day">1 day</option>
              <option value="2 days">2 days</option>
              <option value="3 days">3 days</option>
              <option value="more days">more days</option>
            </select><br>

            <label for="bio"><b>Bio</b></label><br>
            <textarea id="bio" name="gbio" placeholder="Write something.." style="height:90px"></textarea><br>

            <button type="submit" name="gsignup-submit" class="btn btn-primary">SUMBIT</button>
        </form>
    </div>
</body>
</html>
