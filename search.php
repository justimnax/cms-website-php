<?php include "includes/db.php" ?>

<?php include "includes/header.php" ?>


<body>



    <!-- Navigation -->
   <?php include "includes/navigation.php" ?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                    
                    <small>READITx</small>
                </h1>
           



            <?php 

if(isset($_POST['search'])){


    $search =  $_POST['search'];
    
    $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);
    if(!$search_query){
       die("search query failed" . mysqli_error($connection));
    }

    $count = mysqli_num_rows($search_query);
    if($count == 0){
        
        header("Location: index.php");
    }else{
       
        

         
        while($row = mysqli_fetch_assoc($search_query)){

        $post_title	 = $row['post_title'];
        $post_author = $row['post_author'];
        $post_image	 = $row['post_image'];
        $post_content= $row['post_content'];
        $post_date = $row['post_date'];
        
?>
       

       

        
        <p class="lead">
          <a href="index.php"><?php echo $post_author ?></a>
        </p>
       
        
        <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
        <hr>
        <!-- <h2>
            <a href="#"> <?php echo $post_title ?> </a>
        </h2> -->
        <p><?php echo $post_content ?></p>
        <a class="" href="#">More...</a>
       <br>
       <br>
        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
        <hr>


<?php }


    }
        
        
   }
   ?>






              

                <!-- First Blog Post -->

               




               

               

                

               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>


        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
        