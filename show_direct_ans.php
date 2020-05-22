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
            $sql = "SELECT question FROM directq WHERE id = $id";
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
                $sql2 = "SELECT ans FROM directa WHERE queId = $id";
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
        <?php } ?>
</body>
</html>