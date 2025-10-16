<!DOCTYPE html>
<html>
<head>
<title>Insert Images. </title>
</head>
<style>
    .top{
        color: brown;
        text-decoration: underline;
    }
</style>
<body>
    <h1 class="top">Posting Images</h1>
    <form action ="images.php" method="post" name="uploadingImages" enctype="multipart/form-data"><br>
    <h3>INSERT STUDENTS AND PHOTOS</h3>
      <label>Names:</label><input type="text" name="Names"><br> 
      <label>Photos:</label><input type="file" name="photos" accept="image/*"><br>
      <input type="submit" name="save" value="Save Student"><br>

    </form>
    

    <?php
    $conn=mysqli_connect ("localhost","root","","db");
    if(isset($_POST['save']))
    {
        $Names=$_POST['Names'];
        $photos=$_FILES['photos']['name'];
        $target_dir="uploads.$photos";
        $target_file=$target_dir.basename($photos);
        if(move_uploaded_file($_FILES['photos']['tmp_name'],$target_file));

        
    }
    $sql="insert into student(Names,photos) values('$Names','$phtos')";
    $result=mysqli_query($conn,"$sql");
    if($result){
        echo "<h3>Record uploaded successfully </h3>";
        echo "<p>Name:$Names</p>";
       echo "<img src='$target_file'width='150'>";
    }
    else{
        echo"Error uploading photo";
    }

$sql="select Names,photos from student";
    $result=mysqli_query($conn,"$sql");
    if($result){
       // echo "<h3>Record uploaded successfully </h3>";
        echo "<p>Name:$Names</p>";
        echo "<img src='$target_file'width='150'>";
    }
    
    ?>
</body>
</html>