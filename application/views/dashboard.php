<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Dashboard</title>
  </head>
  <body>

    <div class="container mb-4">
        <div class="row mt-4">
            <div class="col">
              <form action="<?= base_url('dashboard/report'); ?>" method="POST">
              <div class="input-group mb-3">
                <select name="area" class="form-select" id="inputGroupSelect01">
                  <option selected>Select Area</option>
                  <?php foreach($area as $row){?>
                  <option value="<?= $row->area_id ?>"><?= $row->area_name ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="input-group mb-3">
               <label for="">Select DateFrom</label>
               <input type="date" name="dateFrom" id="dateFrom" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="input-group mb-3">
                <label for="inputGroupSelect01">Select DateTo</label>
                <input type="date" name="dateTo" id="dateTo" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="input-group mb-3">
                <button type="submit" id="view" class="btn btn-secondary">View</button>
              </div>
            </div>
            </form>
        </div>
        <div class="row" id="report">
          <div id="chartContainer"   class="mt-4" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="row mr-4">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Brand</th>
                <th scope="col">DKI Jakarta</th>
                <th scope="col">Jawa Barat</th>
                <th scope="col">Kalimantan</th>
                <th scope="col">Jawa Tengah</th>
                <th scope="col">Bali</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($brand as $row){ ?>
              <tr>
           
                <td><?= $row->brand_name ?></td>
                <td><?= $brandDKI['sum_compliance'] ?></td>
                <td><?= $brandJawaBarat['sum_compliance'] ?></td>
                <td><?= $brandKalimantan['sum_compliance'] ?></td>
                <td><?= $brandJawaTengah['sum_compliance'] ?></td>
                <td><?= $brandBali['sum_compliance'] ?></td>
             
              </tr>
             <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
    <?php

      foreach($data as $row){

        $nilai  = $row->sum_compliance / $row->total_rows * 100;
        $dataPoints = array(
          array("label" => $row->store_name, "y" => $nilai)
        );

      }
      
      $jsonDataPoints = json_encode($dataPoints);
    ?>
<script type="text/javascript">

  var dataPoints = <?php echo $jsonDataPoints; ?>;

    $(document).ready(function() {
      $('#view').click(function() {
      
        $('#report').css({
          'visibility': 'visible'
        });
      });
    });
    

    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      exportEnabled: true,
      theme: "light1", 
      title:{
        text: "Report Product"
      },
        axisY: {
          includeZero: true
        },
      data: [{
        type: "column", 
        indexLabelFontColor: "#5A5757",
            indexLabelFontSize: 16,
        indexLabelPlacement: "outside",
        dataPoints: dataPoints
      }]
    });
    chart.render();

    }

 
</script>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>