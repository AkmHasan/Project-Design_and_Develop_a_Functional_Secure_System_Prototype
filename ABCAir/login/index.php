<!DOCTYPE html>
<html>
    <head>
        <title>Records</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require_once 'process.php'; ?>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="container">
        <?php
            $mysqli = new mysqli('localhost','root','','abc') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            //pre_r($result);
            ?>

            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Aircraft ID</th>
                            <th>Flight Hours</th>
                            <th>Scheduled Maintenance</th>
                            <th>Engineer</th>
                            <th>Task</th>
                            <th colspan="5">Action</th>
                        </tr>
                    </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['aircraftID']; ?></td>
                        <td><?php echo $row['aircraftFH']; ?></td>
                        <td><?php echo $row['aircraftSM']; ?></td>
                        <td><?php echo $row['aircraftENG']; ?></td>
                        <td><?php echo $row['aircraftENGT']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </table>
            </div>
            <?php

            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>

        <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Aircraft ID</label>
            <input type="text" name="aircraftID" class="form-control"
                   value="<?php echo $aircraftID; ?>" placeholder="Enter Aircraft ID">
            </div>
            <div class="form-group">
            <label>Flight Hours</label>
            <input type="text" name="aircraftFH"
                   value="<?php echo $aircraftFH; ?>" class="form-control" placeholder="Enter Aircraft Flight Hours">
            </div>
            <div class="form-group">
            <label>Scheduled Maintenance</label>
            <input type="text" name="aircraftSM"
                   value="<?php echo $aircraftSM ; ?>" class="form-control" placeholder="Enter Aircraft Scheduled Maintenance">
            </div>
            <div class="form-group">
            <label>Engineer</label>
            <input type="text" name="aircraftENG"
                   value="<?php echo $aircraftENG; ?>" class="form-control" placeholder="Enter name/s of Engineer/s">
            </div>
            <div class="form-group">
            <label>Task</label>
            <input type="text" name="aircraftENGT"
                   value="<?php echo $aircraftENGT; ?>" class="form-control" placeholder="Enter task of Engineer">
            </div>
            <div class="form-group">
            <?php
            if ($update == true):
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
        </div>

        <a href="logout.php">Logout</a>
    </body>
