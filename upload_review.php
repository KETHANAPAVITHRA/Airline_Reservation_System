<?php
	session_start();
?>
<html>
<head>

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<style>
	.contact form{
		border-radius:.5rem;
		background-color: rgb(199, 193, 193);
		padding:2rem;
		margin:0 auto;
		max-width:50rem;
	}
	.box{
		width:100%;
		margin-top:.5rem;
		margin-bottom:.2rem;
		border-radius:.5rem;
		background-color: white;
		font-size:1rem;
		color: black;
		text-transform:none;
		
	}
	span{
		padding-top:10px;
		padding-bottom:20px;
	}
</style>
</head>
<body>
	    <section class="contact" id="contact">
		<h1 class="heading text-center pt-4 text-info">Review</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-group" enctype="multipart/form-data">
			<span >Your Name:</span>
			<input type="text" name="name" placeholder="enter your name" class="form-control" required>
			<span >Your Email:</span>
			<input type="email" name="email" value=<?php echo $_SESSION['email']?>  class="form-control" readonly>
			<span>Upload Image:</span>
			<input type="file" name="file" class="form-control">
			<span>Comment:</span>
			<textarea style="maxwidth:100%" class="box" name="comment" required>
			</textarea>
			<input type="submit" value="Upload Review" name="upload" class="link-btn mt-3 p-2 rounded-3 bg-info">
		</form>
	    </section>

<?php
	$name=$_POST['name'];
	$email=$_POST['email'];
	$comment=$_POST['comment'];
	if(isset($_POST["upload"]))
	{
		$file_name=$_FILES["file"]["name"];
		$file_type=$_FILES["file"]["type"];
		$file_size=$_FILES["file"]["size"];
		$file_temp_loc=$_FILES["file"]["tmp_name"];
		$file_store="upload/".$file_name;
		if(empty($file_name))
		{
			echo "<script>alert('select a file');</script>";
		}

		else
		{
			if($file_type!="image/png" && $file_type !="image/jpeg")
			{
				echo "<script>alert('file can only be png or jpg');</script>";
			}
			else
			{		
				$size=2024000;		
				if($file_size >=$size)
				{
					$size=$size/1024;
					$error="File size is greater than $size kb";
					echo "<script>alert('.$error.');</script>";
				}
				else
				{	
					if(file_exists($file_store))
					{
						echo "<script>alert('file already exists');</script>";
					}
					else
					{
						if(move_uploaded_file($file_temp_loc,$file_store))
						{
							$handler=mysqli_connect("localhost","root","","airline");
							$query1="insert into review values('$name','$email','$file_store','$comment');";
							mysqli_query($handler,$query1);
							echo "<script>alert('Your review successfully uploaded');</script>";
							
						}
						else
						{
							
						}
					}
				}				
			}
			
		}

	}
?>
</body>
</html>
