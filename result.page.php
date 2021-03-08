<div>
    <div>
        <div>
         <?php
            session_start();
            if(isset($_SESSION['message'])){
                echo '<div class="alert alert-success" role ="alert">'
                        . $_SESSION['message'] .
                     '</div>' ;
            }else if(isset($_SESSION['search_result'])){
                $results = $_SESSION['search_result'];
                echo "<h4> Search results: </h4>";
                foreach($results as $result){
                    echo '<pre>' . $result . "\n" . "</pre>";
                }
            }
         ?>

            <div>
             <button><a style="color:white;" href="/test"> Go back to form page </a> </button>
             <button><a href= "read_file.php"> Check database file </a></button>
            </div>
        </div>
    </div>
</div>