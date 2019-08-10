<?php
    if (isset($_POST['submit'])) {
        $file = $_FILES['file']; // Gets all information about the file uploaded :)
        
        //print_r($file);
        
        /*  If we allow the above line then this will be the result.
            (I picked a random file from my dekstop)
            Array ( [name] => Somil.png [type] => image/png [tmp_name] => F:\xampp\tmp\phpCEA4.tmp [error] => 0 [size] => 283511 )

        */

        //Variables that we are going to use..

        $fileName = $_FILES['file']['name']; // Grabs file name.
        $fileTemploc = $_FILES['file']['tmp_name']; // Grabs temp location of the file.
        $fileSize = $_FILES['file']['size']; // Grabs the size.
        $fileError = $_FILES['file']['error']; // Grabs error.
        $fileType = $_FILES['file']['type'];// Grabs the type of file.

        $fileExt = explode('.', $fileName); // To separate the extension 
        $fileActualExt = strtolower(end($fileExt));
        /* 
            There are times where user upload a file with Uppercase extension for eg. .PNG
            so to fix that, we have used strtolower() function and then to grab the extension
            after using explode() function, we have used end() function.
        */
        
        //Now we need to check whether that extension is allowed to be uploaded or not.

        $allowed = array('jpg', 'jpeg', 'png', 'pdf'); // Now only these type of extensions are allowed. 

        // Now we will check whether uploaded file's extension matches our allowed list.

        if(in_array($fileActualExt, $fileExt)) // We will check whether the extension of the uploaded file matches our allowed list.
        {
            // We will check for errors when user uploaded the files
            if($fileError === 0)
            {
                //We will check for file size.
                if($fileSize < 10000000)
                {
                    //There are times where one user uploads test.png and then another use uploads the same file.
                    // And then it will be replaced by the new file. To prevent that we will assign some special value to it.

                    $fileNewName = uniqid('', true).".".$fileActualExt; // We will be using time format and please note if don't mention actual extenstion then file will be saved as Somil not Somil.png.
                    // Time to set file desination!
                    $fileDestination = 'uploads/'.$fileNewName;
                    // New we need to move the file from tmp directory to final destination.
                    move_uploaded_file($fileTemploc, $fileDestination);
                    
                    header("location: index.php?success=uploaded");
                    exit();
                }
                else
                {
                    header("location: index.php?error=filesize");
                    exit();
                }
            }
            else
            {
                header("location: index.php?error=eupload");
                exit();
            }
        }
        else
        {
            header("location: index.php?error=type");
            exit();
        }
                                                
    }