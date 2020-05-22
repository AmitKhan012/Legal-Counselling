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


<?php
    include 'navbar.php';
    include('connect_db.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM lawers WHERE username = '$id'";
        $result = $db_connect->query($sql);
        if ($result->num_rows > 0) {
?>      
        <table>
          <tr>
              <th> First Name </th>
              <th> Last Name </th>
              <th> Mail Address </th>
              <th> Mobile </th>
          </tr>
        <?php    while($row = $result->fetch_assoc()) { ?>
                    <?php
                        $first_name = $row['first_name']; 
                        $last_name = $row['last_name'];
                        $username = $row['username'];
                    ?>
                    <tr>
                        <td> <?php echo $row['first_name'];?> </td>
                        <td> <?php echo $row['last_name'];?> </td>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['contract_number']; ?> </td>
                    </tr>
        <?php    } ?>
        </table>
        <div class="container">
            <section id="main">
                <h1>Need Help!!</h1>
                <button id="button"><a href="direct_question_form.php?id=<?php echo $username; ?>"> <?php echo "Ask " . $first_name . " " . $last_name . " a question"; ?> </a></button>
            </section>
        </div>
<?php   } ?>
<?php } ?>               

         

