<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>How to upload file by GSomil ( Somil Gumber )</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <div class="card my-4">
                <h5 class="card-header">Upload your file!</h5>
                <div class="card-body text-center">
                    <?php
                        // Error handlers 
                        $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // We get the whole url
                        // We will use strpos to find our error type
                        $size = strpos($fullURL, "error=filesize"); // Size Error.
                        $upload = strpos($fullURL, "error=eupload"); // Upload Error.
                        $type = strpos($fullURL, "error=type"); // Type error.
                        // Success
                        $success = strpos($fullURL, "success=uploaded"); // Success message.

                        if($size == true)
                        {
                            echo "<div class='alert alert-danger' role='alert'>
                            You have exceeded the limit!
                          </div>";
                        }
                        elseif($upload == true)
                        {
                            echo "<div class='alert alert-danger' role='alert'>
                            Something went wrong.
                          </div>";
                        }
                        elseif($type == true)
                        {
                            echo "<div class='alert alert-danger' role='alert'>
                            You have uploaded wrong type of file.
                          </div>";
                        }
                        elseif($success == true)
                        {
                            echo "<div class='alert alert-success' role='alert'>
                            You have successfully uploaded the file!
                          </div>";
                        }

                    ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="col-lg-5 mx-auto">
                            <div class="form-group">
                                <label for="file"><b>Choose your file</b>:</label>
                                <input type="file" class="form-control-file" name="file" id="file">
                            </div>
                        </div>
                        
                        
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="card-footer text-right text-muted">
                    By GSomil ( Somil Gumber )
                </div>
            </div>
        </div>
    <div>
</body>
</html>