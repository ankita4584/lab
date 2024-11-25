<!-- \\22. Design and develop a responsive website to prepare one semester result of VIT students using PHP and MySQL. Take any four subjects with MSE Marks (30%) ESE Marks (70%).  -->
 <?php
$db_server="localhost";
$db_user="mysql";
$db_pass="utkarsh12@";
$db_db="vit_results";

$conn=new mysqli($db_server,$db_user,$db_pass,$db_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $student_id = $_POST['std_id'];
   $student_name = $_POST['student_name'];
    $subject1_mse = $_POST['subject1_mse'];
    $subject1_ese = $_POST['subject1_ese'];
    $subject2_mse = $_POST['subject2_mse'];
    $subject2_ese = $_POST['subject2_ese'];
    $subject3_mse = $_POST['subject3_mse'];
    $subject3_ese = $_POST['subject3_ese'];
    $subject4_mse = $_POST['subject4_mse'];
    $subject4_ese = $_POST['subject4_ese'];

    // Calculate Total Marks
    $total_subject1 = ($subject1_mse * 0.30) + ($subject1_ese * 0.70);
    $total_subject2 = ($subject2_mse * 0.30) + ($subject2_ese * 0.70);
    $total_subject3 = ($subject3_mse * 0.30) + ($subject3_ese * 0.70);
    $total_subject4 = ($subject4_mse * 0.30) + ($subject4_ese * 0.70);

    $total_marks = $total_subject1 + $total_subject2 + $total_subject3 + $total_subject4;

    // Determine result
    $result = ($total_marks >= 40) ? 'Pass' : 'Fail';

    // Insert data into database
    $sql = "INSERT INTO marksheet (ID,std_name, sub1_MSE, sub1_ESE, sub2_MSE, sub2_ESE, sub3_MSE, sub3_ESE, sub4_MSE, sub4_ESE, total, result)
            VALUES ('$student_id','$student_name', '$subject1_mse', '$subject1_ese', '$subject2_mse', '$subject2_ese', '$subject3_mse', '$subject3_ese', '$subject4_mse', '$subject4_ese', '$total_marks', '$result')";

$sql1="DELETE FROM marksheet WHERE ID = 78 ";
$output=mysqli_query($conn,$sql1);
    if ($output === TRUE) {
        // echo "Result added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-group{
            margin:10px;
            padding:10px;
        }
    </style>

  </head>
  <body>
  <div class="container">
        <h1>Add Student Result</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="id">Student id</label>
                <input type="number" class="form-control" id="std_id" name="std_id" required>
                <label for="student_name">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            
            <!-- MSE and ESE Marks for each subject -->
            <div class="form-group">
                <label for="subject1_mse">Subject 1 MSE Marks (30%)</label>
                <input type="number" class="form-control" id="subject1_mse" name="subject1_mse" required><br><br>
                <label for="subject1_ese">Subject 1 ESE Marks (70%)</label>
                <input type="number" class="form-control" id="subject1_ese" name="subject1_ese" required>
            </div>

            <div class="form-group">
                <label for="subject2_mse">Subject 2 MSE Marks (30%)</label>
                <input type="number" class="form-control" id="subject2_mse" name="subject2_mse" required><br><br>
                <label for="subject2_ese">Subject 2 ESE Marks (70%)</label>
                <input type="number" class="form-control" id="subject2_ese" name="subject2_ese" required>
            </div>

            <div class="form-group">
                <label for="subject3_mse">Subject 3 MSE Marks (30%)</label>
                <input type="number" class="form-control" id="subject3_mse" name="subject3_mse" required><br><br>
                <label for="subject3_ese">Subject 3 ESE Marks (70%)</label>
                <input type="number" class="form-control" id="subject3_ese" name="subject3_ese" required>
            </div>

            <div class="form-group">
                <label for="subject4_mse">Subject 4 MSE Marks (30%)</label>
                <input type="number" class="form-control" id="subject4_mse" name="subject4_mse" required><br><br>
                <label for="subject4_ese">Subject 4 ESE Marks (70%)</label>
                <input type="number" class="form-control" id="subject4_ese" name="subject4_ese" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Result</button>
            <?php echo '<h2>'."total marks: ".$total_marks."  Results:".$result.'<h2>'?>
        </form>
    </div>
  </body>
  </html>
  