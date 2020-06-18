<?php 

    function getActivityLog(){
        @include('../../library-process/connection.php');
        $query = 'SELECT * FROM activity_log ORDER BY date, timeCreated DESC';
        $pStatement = $conn->prepare($query);
        $pStatement->execute();
        $result = $pStatement->get_result();

        while($row = $result->fetch_assoc()){
            echo '<div class="alert alert-shadow flex-column align-items-start shadow" role="alert">
              <div class="row">       
                <div class="col-5">
                   <h6>'.$row['description'].'</h6>
                </div>
                <div class="col-2">
                    <h6>'.$row['date'].'</h6>
                </div>
                <div class="col-2">
                    <h6>'.$row['timeCreated'].'
                </div>
              </div>
            </div>';
        }
        $pStatement->close();
    }

    function insertLog($message){
        @include('../../library-process/connection.php');
        $query = 'INSERT INTO activity_log (description,timeCreated,date) VALUES(?,?,?)';
        $pStatement = $conn->prepare($query);
        $dateNow = date("Y-m-d");
        $timeNow = date("H:i:s");
        echo $timeNow;
        echo $dateNow;
        $pStatement->bind_param("sss",$message,$timeNow,$dateNow);
        $pStatement->execute();
        $pStatement->close();
    }

?>