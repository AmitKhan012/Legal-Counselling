<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/request_form.css">
</head>
<body>

    <?php
        include 'navbar.php';
        include('connect_db.php');
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT question FROM questions WHERE id = $id";
            $result = $db_connect->query($sql);
            if ($result->num_rows > 0) {
    ?>        
                <table>
                
                <?php    while($row = $result->fetch_assoc()) { ?>
                    <tr>                        
                        <td> <?php  echo "Question"; ?> </td>   
                        <td> <?php  echo  $row["question"]; ?></td>
                    </tr>   

                <?php    } ?>
                
                
            <?php    } ?>

            <?php
                $sql2 = "SELECT ans FROM answers WHERE queId = $id";
                $result2 = $db_connect->query($sql2);
                if ($result2->num_rows > 0) {
            ?>
                
                <?php    while($row2 = $result2->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php  echo "Answer"; ?>
                        </td>
                        <td>
                            <?php  echo $row2["ans"]; ?>   
                        </td>
                    </tr>
                <?php    } ?>
                </table>
            <?php    } ?>

            <?php 
                $sql3 = "SELECT question_categories FROM questions WHERE id = $id";
                $result3 = $db_connect->query($sql3);
                $row3 = $result3->fetch_assoc();
                $category =  $row3["question_categories"];    
                $sql4 = "SELECT * FROM questions WHERE question_categories = '$category' AND id != $id";
                $result4 = $db_connect->query($sql4); 
                if ($result4->num_rows > 0) {           
            ?>
                <h3> Related Questions </h3>
                    <table>
                    <?php    while($row4 = $result4->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php  echo "Question"; ?>
                        </td>
                        <td>
                            <?php  echo $row4["question"]; ?>   
                        </td>
                        <td>
                            <a href="show_ans.php?id=<?php echo $row4['id']; ?>"><span style="color:blue"> Show Answers </span></a>
                        </td>
                    </tr>
                    <?php    } ?>
                    </table>
                <?php } ?>

        <?php } ?>


</body>
</html>