<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
              crossorigin="anonymous">
        <style>
            body {
                background-color: #f8fafc;
            }

            .navbar-laravel {
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            }

            /* Sticky footer styles */
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 60px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 60px;
                line-height: 60px; /* Vertically center the text there */
                background-color: #fff;
                box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.04);
            }
        </style>

        <title>Upload</title>
    </head>
    <body>
        <?php
        if (isset($_FILES['image'])) {
            $filename = $_FILES["image"]["name"];
            $tmp_path = $_FILES["image"]["tmp_name"];
            $target_path = __DIR__ . "/uploads/" . $filename;

            copy($tmp_path, $target_path);
        }
        ?>

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Gallery
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container text-center">
                <h3>Collaborative gallery</h3>

                <form class="form-inline my-4" method="POST" action="/" enctype="multipart/form-data">
                    <div class="form-group" style="margin: 0 auto; float: none;">
                        <input id="image" type="file" class="mr-2 form-control" name="image" value="" required>

                        <button type="submit" class="btn btn-primary">
                            Upload
                        </button>
                    </div>
                </form>

                <div>
                    <?php foreach (array_diff(scandir(__DIR__ . "/uploads"), [".", ".."]) as $image) { ?>
                    <img src="<?php echo "/uploads/" . $image ?>" class="img mx-1 my-1" height="200px">
                    <?php } ?>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">
                    <a href="https://gitlab.cylab.be/cylab/play/upload">Upload</a>
                    <?php echo file_get_contents(__DIR__ . '/VERSION') ?> |
                    <a href="https://cylab.be">cylab.be</a>
                </span>


                <span class="pl-3">
                    Original images <a href="https://unsplash.com/">https://unsplash.com/</a>
                </span>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
                crossorigin="anonymous"></script>
    </body>
</html>