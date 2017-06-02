<?php
            include("config.php");

            $sql = "SELECT S.std_id, S.login_id, S.fname, S.lname, S.gender, S.dob, S.email_id, S.phone_no, S.address, S.10_perc, S.12_perc, S.diploma_perc, C.course_name, S.reg_no, S.sem_id, S.roll_no, S.year_join, S.diploma FROM nodalcenter WHERE login_id = $id";
            $result = $db->query($sql);

            $row = '';
            if ($result->num_rows == 1) {
                // output data
                $row = $result->fetch_assoc();
                $std_id = $row["std_id"];
                $sem_id = $row["sem_id"];
            } else {
                echo "No results";
            }

            $sql1 = "SELECT * FROM semester WHERE sem_id = $sem_id";
            
            $result1 = $db->query($sql1);

            $row1 = '';
            if ($result1->num_rows == 1) {
                // output data
                $row1 = $result1->fetch_assoc();
                $sem_name = $row1["name"];
            } else {
                echo "No results";
            }

            $db->close();
        ?>
        <div class="row">
            <div class="col-sm-4">
                <div class="container">
                    <div class="card">
                        <?php 
                            if($row["gender"] == 'M' || $row["gender"] == 'm')
                                echo '<img src="img_avatarM.png" alt="Avatar" style="width:100%">';
                            else
                                echo '<img src="img_avatarF.png" alt="Avatar" style="width:100%">';
                        ?>
                        <div class="card_container">
                            <h4><b> <?php echo $row["fname"] ." " . $row["lname"] ?> </b></h4>
                            <p>Roll No. <?php echo $row["roll_no"] ?>, SEM <?php echo $sem_name ?><br><?php echo $row["course_name"]?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
            </div>
        </div>