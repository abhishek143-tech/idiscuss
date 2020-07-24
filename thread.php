<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>iForum-code and discuss</title>
</head>

<body>
    <?php include 'partials/navbar.php';?>
    <?php include 'dbconnect.php';?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id`='$id'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
    ?>
    <?php
    $noResult=true;
    $showAlert = false;
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    $noResult=false;
    $showAlert = true;
    $content = $_POST['comment'];
    $query="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$content', '$id', '0', current_timestamp())";
    $result = mysqli_query($conn,$query);
    if($showAlert){
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>success!</strong> your comment has been added please wait community to respond.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
    }
   
}

    ?>
    <!-- silder strats here -->


    <!-- category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php  echo $name;?> forum</h1>
            <p class="lead"><?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is peer to peer forum for sharing knowledge with each other.</p>
            <p>posted by- <b>Abhishek Dhok</b></p>
        </div>

    </div>

    <div class="container">
        <h1>Post a comment</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
            <div class="form-group">
                <label for="comment">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container my-3">
        <h1>Discussion</h1>


        <?php
            
                $id = $_GET['threadid'];
                $sql = "SELECT * FROM `comments` WHERE thread_id='$id'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $noResult = false;
                    $id = $row['comment_id'];
                    $content = $row['comment_content'];
                    $comment_time = $row['comment_time'];
                
                
                    echo '<div class="media my-3">
                        <img src="img/user.webp" width="40px" class="mr-3" alt="...">
                        <div class="media-body">
                        <p class="font-weight-bold my-0">Anonymous User At '.$comment_time.'</p>

                            '.$content.'
                        </div>
                    </div>';
                  }

                  if($noResult){
                    echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                      <h1 class="display-4">No comments Found</h1>
                      <p class="lead">be the first person to post a comment</p>
                    </div>
                  </div>';
                }
                  
                    ?>



    </div>
    <?php
    include 'partials/footer.php';
  ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>