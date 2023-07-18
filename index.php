<?php
    $page_file="HOME";
    $css_file="home.css";
    include_once("./includes/tamplet/header.php");
    require_once("./connect_db.php");

    global $con;
    // select 
    // 1- quray
    // 2- excute 
    // 3-fetch 


    // insert
    // 1- query 
    // 2- excute
  
    // delete 
    // 1- query 
    // 2- excute


    $stmt=$con->prepare("SELECT * FROM students");
    $stmt->execute();
    $students=$stmt->fetchAll(); // في هنا يديل 
   
?>

<table class='content-table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>College</th>
            <th>GPA</th>
            <th>Department</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td>
                    <?php echo $student['Id'] ?>
                </td>
                <td>
                    <?php echo $student['name'] ?>
                </td>
                <td>
                    <?php echo $student['college'] ?>
                </td>
                <td>
                    <?php echo $student['GPA'] ?>
                </td>
                <td>
                    <?php echo $student['department'] ?>
                </td>
                <td>
                    <a class="del" href="delete.php?stu_id=<?php echo $student['Id'] ?>">Delete</a>
                </td>

            </tr>
        <?php } ?>
    </tbody>
</table>


<a href="add_student.php"> Add Student </a>
<?php
    include_once("./includes/tamplet/footer.php")
?>