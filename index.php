<?php
  include 'core/manager.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escort Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1>ESCORT APPLICATION</h1>

      <h4 class="text-success">
        <?php
          if(isset($_GET['msg'])) {
            echo $_GET['msg'];
          }
        ?>
      </h4>
      <div class="form"> 
        <form method="POST" action="config.php" class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="cname">Client Name</label>
              <input type="text" class="form-control" id="cname" placeholder="Client Name" name="cname" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="pname">Principal Name</label>
              <input type="text" class="form-control" id="pname" placeholder="Principal Name" name="pname" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="etype">Escort Type</label>
              <input type="text" class="form-control" id="etype" placeholder="Escort Type" name="etype" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="reqdate">Request Date</label>
              <input type="date" class="form-control" id="reqdate" name="reqdate" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="time">Time</label>
              <input type="time" class="form-control" id="time" placeholder="Time" name="reqtime" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="arrdept">Arrival/Departure</label>
              <select class="form-control" id="arrdept" name="arrdept" required>
                <option value="">Arrival/Departure</option>
                <option value="arrival">Arrival</option>
                <option value="departure">Departure</option>
              </select>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="pickup">Pick-Up Point</label>
              <input type="text" placeholder="Pick-Up Point" class="form-control" id="pickup"  name="pickup" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="flight">Flight</label>
              <input type="text" class="form-control" id="flight" name="flight" placeholder="Fight" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="dest">Destination</label>
              <input type="text" class="form-control" id="dest" name="destination" placeholder="Destination" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="float-right">
            <button class="btn btn-primary" type="reset">Reset</button>
            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="tbarival col-md-12">
          <table class="table table-responsive">
            <h2>ARRIVAL</h2>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Client Name</th>
                <th scope="col">Principal Name</th>
                <th scope="col">Type</th>
                <th scope="col">Flight</th>
                <th scope="col">Time</th>
                <th scope="col">Pick-up Location</th>
                <th scope="col">Destination</th>
              </tr>
            </thead>
            <tbody>
              <?php
                
                $info = new ExcortManager();
                $arrivals = $info->viewExcorts('arrival');

                $counter = 1;
                foreach($arrivals as $key => $row){
                 
                  echo  '
                    <tr>
                      <td>'.$counter.'</td>
                      <td>'.$row['reqdate'].'</td>
                      <td>'.$row['cname'].'</td>
                      <td>'.$row['pname'].'</td>
                      <td>'.$row['etype'].'</td>
                      <td>'.$row['flight'].'</td>
                      <td>'.$row['reqtime'].'</td>
                      <td>'.$row['pickup'].'</td>
                      <td>'.$row['destination'].'</td>
                    </tr>
                    ';
                    $counter++;
                }
              ?>
            </tbody>
          </table>
        </div>
        <div class="tbdeparture col-md-12">
          <table class="table table-responsive">
            <h2>DEPARTURE</h2>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Client Name</th>
                <th scope="col">Principal Name</th>
                <th scope="col">Type</th>
                <th scope="col">Flight</th>
                <th scope="col">Time</th>
                <th scope="col">Pick-Up Location</th>
                <th scope="col">Destination</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
                $info = new ExcortManager();
                $departure = $info->viewExcorts('departure');
                $counter = 1;
                foreach($departure as $key => $rows) {
                    echo  '
                    <tr>
                      <td>'.$counter.'</td> 
                      <td>'.$rows['reqdate'].'</td>
                      <td>'.$rows['cname'].'</td>
                      <td>'.$rows['pname'].'</td>
                      <td>'.$rows['etype'].'</td>
                      <td>'.$rows['flight'].'</td>
                      <td>'.$rows['reqtime'].'</td>
                      <td>'.$rows['pickup'].'</td>
                      <td>'.$rows['destination'].'</td>
                    </tr>
                    ';
                  $counter++;
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <script>
    //JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
  </body>
</html>
