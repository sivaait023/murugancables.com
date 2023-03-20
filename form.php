<! DOCTYPE html>
<html>
   <title>FORM</title>   

<style>
body{
    margin:0px;
    padding:0px;
    background:rgba(90, 100, 80, 0.1);
    background-size:cover;
    text-align:center;
    border-style:double;
}
h1,h2{
    color:red;
    text-transform: uppercase;
    text-shadow:2px 2px 3px yellow;
    font-size:20px;
}
h2{color: chocolate;}
table,th,td{
    border:1px solid grey;
    text-transform:uppercase;
    border-collapse:double;
    text-align:left;
    padding: 10px 10px;
}
.center{
    margin-left:auto;
    margin-right:auto;
    text-align:center;
}
.f_family{
    font-family: 'Times New Roman', Times, serif;
}
.row{
    align-items: stretch;
}
</style>
<body>
    <img src="img.png" height=80px width=80px>
    <h1>murugan cables</h1>
    <h2>bsnl bill</h2>
    <table class="center"width=75%>
        <tr>
            <th class="center">DETAILS</th>
        </tr>
    </table ><br>
    <table class="center" width=75%>
        
        <tr class="f_family" >
           <td colspan="3"> Name of client         :<?php echo $_POST["NAME"]; ?> <br><br>Broadband Number        :<?php echo $_POST["phone"]; ?><br><br>
            Date of Installation       :  <?php echo $_POST["date"]  ?><br></td>  
        </tr>   
        <tr class="f_family">
           <td>Billing Date:<p id="datebill">dwd</p></td>
           <td>Month  : <?php 
                      $month=date("F");
                      echo $month;?></td>
           <td>year:<?php echo  date("Y")?></td>
        </tr>  
    </table><br>
    <table class="center" width=100%>
        <th>s.no</th>
        <th>charging particulars</th>
        <th>price</th> 
        <th>QUANTITY</th>
        <th>netamount</th>
        <tr>
            <td>1.</td>
            <td> wiring charges</td>
            <td><?php echo $_POST['cost'];          ?></td>
            <td><?php echo $_POST['meter'];?>(in meters)</td>
            <td><?php echo $_POST['netamount'];          ?></td>   
        </tr>
        <tr>
            <td>2.</td>
            <td>Installation charge</td>
            <td><?php echo $_POST['installs'];?></td>
            <td>--</td>
            <td><?php echo $_POST["installs"]; ?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>modem charges</td>
            <td><?php echo $_POST['mdm'];?></td>
            <td>--</td>
            <td><?php echo $_POST["mdm"]; ?></td>
        </tr>
        <tr class="row">
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL</td>
            <td><?php echo $_POST["mdm"]+$_POST["installs"]+$_POST["netamount"]; ?></td>
        </tr>

    </table>   
    
   <p></p>
<button onclick="window.print()">PRINT</button>
<script>
    var dt=new Date();
    document.getElementById('datebill').innerHTML=dt.toLocaleString();
</script>
<?php
    $name=$_POST['NAME'];
    $phone=$_POST['phone'];
    $date=$_POST['date'];
    $cost=$_POST['cost'];
    $meter=$_POST['meter'];
    $netamount=$_POST['netamount'];
    $installs=$_POST['installs'];
    $mdm=$_POST['mdm'];
 

    $connection =new mysqli('localhost','root','','login');
    if($connection->connect_error){
        echo ("connection failed 🥺🥺".$connect_error);

    }else{
        $stmt=$connection->prepare("insert into detail(NAME,phone,date,cost,meter,netamount,installs,mdm) values(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssiiiii",$name,$phone,$date,$cost,$meter,$netamount,$installs,$mdm);
        $stmt->execute();
        echo "";
        $stmt->close();
        $connection->close();
    }
    
?>
</body>
</html>