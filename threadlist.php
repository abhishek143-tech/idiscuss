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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id`='$id'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    $showAlert = true;
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];
    $query = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
    $result = mysqli_query($conn,$query);
    if($showAlert){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>success!</strong> your thread has been added please wait community to respond.
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
            <h1 class="display-4">Welcome to <?php  echo $catname;?> forum</h1>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>This is peer to peer forum for sharing knowledge with each other.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>

    </div>
    <div class="container">
        <h1>Ask a question</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
            <div class="form-group">
                <label for="title">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="desc">Elaborate your problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container my-3">
        <h1>Browse questions</h1>
        <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
    $result = mysqli_query($conn,$sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $name = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_time = $row['timestamp'];
    
    
        echo '<div class="media my-3">
            <img src="img/user.webp" width="40px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">Anonymous User At '.$thread_time.'</p>
                <h5 class="mt-0"><a href="thread.php?threadid='.$id.'">'.$name.'</a></h5>
                '.$desc.'
            </div>
        </div>';
}
if($noResult){
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">No Questions Found</h1>
      <p class="lead">be the first person to ask question</p>
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