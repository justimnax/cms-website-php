<?php include "includes/db.php" ?>

<?php include "includes/header.php" ?>


<body>



    <!-- Navigation -->
   <?php include "includes/navigation.php" ?>




    <!-- Page Content -->
    <div class="container">
    
        <div class="row">
        <div class="col-md-8">
<?php
 if(isset($_GET['category'])){
    $post_category_id = $_GET['category'];
}
$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
$select_cat = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_cat)){
    $cat_name = $row['cat_title'];
}





?>



            <!-- Blog Entries Column -->
            <h1 class="page-header">
                
                <?php if($_SESSION['username']){
                    $the_name = $_SESSION['username'];
                    echo "{$the_name} <small> you are browsing </small>{$cat_name}";
                }else{
                    echo "<small>browsing {$cat_name} </small>";
                } ?>
            </h1>
           

                <!-- First Blog Post -->

                <?php 
               
                $query = "SELECT * FROM posts WHERE post_category_id =$post_category_id";
                $select_all_posts = mysqli_query($connection, $query);
                // if($select_all_posts){
                //     echo "selected";
                // }
                while($row = mysqli_fetch_assoc($select_all_posts)){
                    $post_id	 = $row['post_id'];
     
                $post_title	 = $row['post_title'];
                $post_author = $row['post_author'];
                $post_image	 = $row['post_image'];
                $post_content= $row['post_content'];
                $post_date = $row['post_date'];
                

                ?>

                
                <p class="lead">
                  <a href="index.php"><?php echo $post_author ?></a>
                </p>
               
                <a href="post.php?p_id=<?php echo $post_id ; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
                </a>
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


<?php



                }
                ?>





               

               

                

               

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
        