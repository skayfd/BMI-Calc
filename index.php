<?php
include "header.php";
$pounds= 2.2;
$inc = 12;
$lName="LastName,";
$fName="FirstName";
$mName="MiddleName";
$htFT=null;
$htIN=0;
$BMI=null;
$wtLB=null;
$denom=null;
$nume=null;
if($_POST==true){
  $wtKG = $_POST["wtKG"];
  $htFT = $_POST["htFT"];
  $htIN = $_POST["htIN"];
  $fName = $_POST["fName"];
  $mName = $_POST["mName"];
  $lName = $_POST["lName"];
  if($wtKG  == null||$htFT  == null || $fName  == null ||$lName  == null||$mName  == null){
    echo '<div class="alert alert-danger" role="alert">
    Please Fill out the fields
  </div>';
  }
  else{
  $wtLB = $wtKG * $pounds;
  $htIN = ($htFT * $inc)+$htIN;
  $denom = $wtLB * 703;
  $htIN2=$htIN;
  $nume = $htIN2*$htIN;
  $BMI = $denom/$nume;
  $wtLB = round($wtLB,1); 
  $BMI=round($BMI,1);
  }
}
?>
<body>
<div class="container">
  <form  method="POST" action="index.php"> 
    <div class="form-row">
    <div class="form-group col-md-8">
    <div class="form-row">
        <div class="form-group col-md-4">
          <label>First Name</label>
          <input type="text" class="form-control" name="fName">
        </div>

        <div class="form-group col-md-4">
          <label>Middle Name</label>
          <input type="text" class="form-control" name="mName">
        </div>

        <div class="form-group col-md-4">
          <label >Last Name</label>
          <input type="text" class="form-control" name="lName">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label >Weight(kg.)</label>
          <input type="text" class="form-control" name="wtKG">
        </div>
            <div class="form-group col-md-6">
              <label >Height(ft. and in.)</label>
              <div class="form-row">
              <div class="form-group col-md-6">
                <input  type="text" class="form-control" name="htFT" placeholder="feet">
              </div>
              <div class="form-group col-md-6">
                <input  type="text" class="form-control" name="htIN"placeholder="inches">
              </div>
              </div> 
            </div>
      </div>
      <button type="submit" class="btn btn-outline-primary">Calculate Body Mass Index</button>
    </div>
      <div class="form-group col-md-4"> 
      <div class="card">
        <div class="card-header">
            <strong><?php
                  echo $lName;     
                  echo $fName;
                  echo $mName;
                  if($_POST==true){
                    if($wtKG  == null||$htFT  == null || $fName  == null ||$lName  == null||$mName  == null){
                      echo $lName="LastName,";     
                      echo $fName="FirstName";
                      echo $mName="MiddleName";
                  }
                }
                ?></strong>
         </div>
         <div class="card-body">
          <div class="card-title"><strong>Weight(pounds):</strong>
              <?php
              echo $wtLB;
              ?>
            </div>
          <div class="card-title"><strong>Height(inches):</strong>
            <?php
            echo $htIN;
            ?>
          </div>
          <div class="card-title"><strong>Body Mass Index: </strong>
            <td><?php
            echo $BMI;   
            ?>
          </div>
          <div class="card-title"><strong>Interpolation: </strong>
            <?php
            if($_POST){
            if($BMI < 18.5 && $BMI != null){
              echo "Underweight";
            }
            else if($BMI > 18.4 && $BMI < 25){
              echo "Normal";
            }
            else if($BMI > 24.9 && $BMI < 30){
              echo "Overweight";
            }
            else if($BMI > 30 ){
              echo "Obese";
            }
          }
            ?>
          </div>
        </div>
      </div>
    </div>
    </div>
</form>
</div>
</body>


<?php include "footer.php"?>