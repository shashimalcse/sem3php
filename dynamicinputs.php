<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="form-group">
        <table id="dynamic-field">
            <tr>
              <td><input type="text" name="name" placeholder="Vehical" class="form-control"></td>
              <td><button type="button" name="add" id="add" class="btn btn-primary">+</button></td>
            </tr>
        </table>
        <input type="button" name="submit" value="Submit" class="btn btn-primary">
      </div>

    </div>

  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    var i=1;
    $('#add').click(function(){
      i++;
      $('#dynamic-field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Vehical" class="form-control"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

  $(document).on('click','.btn_remove',function(){
    var button_id=$(this).attr("id");
    $('#row'+button_id+'').remove();
  });
    
  })
</script>
