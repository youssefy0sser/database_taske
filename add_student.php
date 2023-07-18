<?php
$page_file="add student";
$css_file="home.css";
include_once("./includes/tamplet/header.php");
require_once('./connect_db.php');

global $con;
//طريقه تنضيف الداتا قبل مااحطها في الداتا بيز 
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $college = filter_var($_POST['college'], FILTER_SANITIZE_STRING);
    $GPA = filter_var($_POST['GPA'], FILTER_SANITIZE_NUMBER_INT);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);

$stmt=$con->prepare("INSERT INTO students(name , college , GPA  , department ) VALUE (?,?,?,?)"); // بتبعت تفسي عدد الفاليووز

$stmt->execute(array($name, $college,$GPA ,$department));
header("Refresh:2;url=add_student.php");
}
?>

<div class="form">
    <h1> Add student</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" class="input" placeholder="name"><br>

        <label for="college">College:</label><br>
        <input type="text" name="college" class="input" placeholder="college"><br>

        <label for="GPA">GPA:</label><br>
        <input type="number" min="0" max="4" step=".1" name="GPA" class="input" placeholder="GPA"><br>

        <label for="department">Department:</label><br>
        <input type="text" name="department" class="input" placeholder="department"><br><br>

        <input type="submit" name="submit" class="sub" VALUE="Add"><br><br>
    </form>
</div>

<?php
include_once("./includes/tamplet/footer.php");
?>