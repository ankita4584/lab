
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container content-center">
        <div class="card mt-5">
            <h1>Electricity bill calculator</h1>
            <div class="card-body">
                <form method="POST" action="">
                <div class="mb-3">  
                <label>Units:</label><br>
                    <input type="number" class="m-2" name="unit"><br>
                </div>
                    <button class="m-2 btn btn-secondary btn-content-center" type="submit" id="submit"> Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $unit=$_POST['unit'];
    $totalbill=0;
    if(!isset($unit)){
echo htmlspecialchars("plz enter the units");
    }else if ($unit <= 50) {
        $totalbill = $unit * 3.5;
    } else if ($unit <= 150) {
        $totalbill = ($unit - 50) * 4.0 + 50 * 3.5;
    } else if ($unit <= 250) {
        $totalbill = ($unit - 150) * 5.2 + 50 * 3.5 + 100 * 4.0;
    } else {
        $totalbill = 50 * 3.5 + 100 * 4.0 + 100 * 5.2 + ($unit - 250) * 6.5;
    }
    echo "<div class='mt-3'>Your total bill is Rs. " . number_format($totalbill, 2) . "</div>";
}
?>