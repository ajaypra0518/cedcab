<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ola Cab</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
.output input{
    border:none;
    outline:none;
}
 
</style>

<body>
      <!---------------------------header----------------------------->
    <?php include "header.php";
    
    include "dbconnection.php";
    $query="select * from tbl_location";
    $result=mysqli_query($con,$query);
    $result1=mysqli_query($con,$query);
    
    ?>
      <!---------------------------header----------------------------->

    <div class="container-fluid  px-0 backimg">
        <div class="row mx-0 pt-4">
            <div class="container text-center ">
                <h1 class="mhead">Book a City Taxi to your destination in town</h1>
                <p class="phead"> Choose from a range of categories and prices</p>
            </div>
        </div>

        <div class="container-fluid ">
            <div class="container">
                <div class="row">
                    <div class="myclass1 col-sm-12 col-xs-12 ">
                        <form class="frm px-2" id="frm">
                            <div class=" text-center "><span class="ctaxi">CITY TAXI</span></div>
                            <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.336); "></div>
                            <label class="tpartner">Your everyday travel partner</label>
                            <label class="accabs">AC Cabs for point to point travel</label>

                            <div class="select">
                                <span class="dropname">PICKUP</span>
                                <select name="pickup" id="pickup" style="margin-left:8px; ">
                                     <option selected hidden disabled>Pickup Location</option>
                                    <?php
                                    while($row=mysqli_fetch_assoc($result)){
                                        if($row['is_available']==1){
                                    ?>
                                     <option value="<?php echo $row['name']?>"><?php echo $row['name'];?></option>

                                    <?php }} ?>

                                </select>
                            </div>
                            <label for="pickup" generated="true" class="error error1"></label>

                            <div class="select">
                                <span class="dropname">DROP</span>
                                <select name="drop" id="drop">
                                    <option selected hidden disabled>Drop Location</option>
                                    <?php
                                    while($row1=mysqli_fetch_assoc($result1)){
                                        if($row1['is_available']==1){
                                    ?>
                                     <option value="<?php echo $row1['name']?>"><?php echo $row1['name'];?></option>

                                    <?php }} ?>
                                </select>
                            </div>
                            <label for="drop" generated="true" class="error error1"></label>

                            <div class="select">
                                <span class="dropname">CARS</span>
                                <select name="cars" id="cars">
                                    <option selected hidden disabled>Choose Cab</option>
                                    <option value="CedMicro">CedMicro</option>
                                    <option value="CedMini">CedMini</option>
                                    <option value="CedRoyal">CedRoyal</option>
                                    <option value="CedSUV">CedSUV</option>
                                </select>
                            </div>
                            <label for="cars" generated="true" class="error error1"></label>

                            <div class="select">
                                <span class="dropname">WEIGHT</span>
                                <!-- <input type="number" class="weight" name="weight" id="weight"
                                    placeholder="Enter Weight in KG" oninput="this.value = Math.abs(this.value)"
                                    onKeyPress="if(this.value.length==3) return false;" max="999" min="0"
                                    onpaste="return false;" data-error="errNm1" > -->

                                    <input type="text" name="weight"  id="weight" class="weight"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                      onpaste="return false;"   placeholder="Enter Weight in KG" autocomplete="off" >
                            </div>
                            <label class="error1" id="abc"></label>
                            <span ></span>

                            <input type="submit" class=" select btn1 col-12" value="Calculate Fare" name="submit"
                                id="submit" >
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------------- Modal ------------------------------>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">BOOKING INFORMATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
               
            </div>
        </div>
    </div>


   <!---------------------------footer----------------------------->
   <?php include "footer.php";?>
     <!---------------------------footer----------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="project.js"></script>
</body>

</html>