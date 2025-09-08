<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVSPOTTER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="row">
            <div class="col-md-12"><div class="cont">
                <div class="card mt-4">
                    <div class="card-header">
                        <h1 class="vehicles">EV SPOTTER</h1>
                    </div>
                    <br>
                    <div class="header-image">
                    <img src="finalheader.png" >
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                    
                                <form action="" method="GET">
                                <div class="input-group mb-3"  >
                                    <div class="box"><label class="pin" for="2">Enter a Pincode: </label><br><input id="2" required type="number" name="inputpincode" 
                                      value="<?php if(isset($_GET['inputpincode'])){echo $_GET['inputpincode'];}?>" class="form-control" placeholder="Enter a Pincode">
                                    <br><br>
                                    <div class="radio-buttons">
                                        <input id="1"  type="radio" name="wheeler[]" value="2-Wheeler" >
                                        <label for="wheeler[]">2-Wheeler </label>
                                        <input id="1" type="radio" name="wheeler[]" value="3-Wheeler" >
                                        <label for="wheeler[]">3-Wheeler </label>
                                        <input id="1" type="radio" name="wheeler[]" value="4-Wheeler" >
                                        <label for="wheeler[]">4-Wheeler </label>
                                        <br>
                                        <br>
                        
                                    <button type="submit" name="inner" id="045" class="btn btn-primary">LOCATE STATIONS</button>
                                    </div>
                                    <section><a href="#tabledata"></a></section>
                                    
                                    </div></div>
                                   
                                    </a>
                                    </div></form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div><section id="tabledata">
                        <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                           <tr>
                                                <th>NAME OF THE STATION</th>
                                                <th>WHEELER</th>
                                                <th>ADDRESS</th>
                                                <th>PHONE</th>
                                                <th>CHARGING TYPES</th>
                                                <th>TIMINGS</th>
                                                <th>PINCODE</th>

                                            </tr>
                                        </thead>
                                    <tbody></tbody>
                                            <?php

                                            $conn = mysqli_connect("localhost","root","","spotter");
                                            if(mysqli_connect_error()){
                                                echo "ERROR OCCURED". mysqli_connect_error();
                                            }
                                            if(isset($_GET["inputpincode"] ) || isset($_GET["wheels"]))
                                            {
                                                (isset($_GET["wheeler"]) && is_array($_GET["wheeler"]));
                                            if(isset($_GET["inputpincode"] ) && (isset($_GET["wheeler"]) && is_array($_GET["wheeler"])))
                                            {
                                                        $filte1r=$_GET["inputpincode"];
                                                        $wheels= implode(",",$_GET["wheeler"]);

                                                        $query1 = "SELECT * FROM stations where pincode=$filte1r and wheeler like '%$wheels%' ";

                                                    $query_run = mysqli_query($conn, $query1);
                                            }
                                            elseif(isset($_GET["inputpincode"] ) &&  ! isset($_GET["wheels"]) )
                                            {
                                                $filte1r=$_GET["inputpincode"];
                                                $query2 = "SELECT * FROM stations where pincode=$filte1r";
                                                $query_run = mysqli_query($conn, $query2);
                                            }
                                           
                                                    
                                                if(mysqli_num_rows($query_run)>0){

                                                        foreach($query_run as $items){
                                                        ?>  
                                                            <tr class="innertable">
                                                            <td><?= $items['NAME OF THE STATION'];?></td>
                                                            <td><?= $items['WHEELER'];?></td>
                                                            <td><?= $items['ADDRESS'];?></td>
                                                            <td><?= $items['PHONE'];?></td>
                                                            <td><?= $items['CHARGING TYPES'];?></td>
                                                            <td><?= $items['TIMINGS'];?></td>
                                                            <td><?= $items['PINCODE'];?></td>
                                                        </tr>
                                                            <?php
                                                    }
                                                }
                                                    else{
                                                        ?>
                                                        <tr>
                                                            <td colspan="6" class="no_rec">No records Found</td>
                                                        </tr>
                                                        <?php 
                                                    }   
                                                }
                                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div></section>
                </div>
            </div>
    </body>
</html>