<?php
            $filename = 'data.txt';
            $video = '';
            $id = $_GET['id'];
           
            if (file_exists($filename)) {
                $file = fopen($filename, 'r');
                if ($file) {
                    while (($line = fgets($file)) !== false) {
                        $data = explode('|&@wahid@&|', trim($line));

                        // Vérifier si les données sont bien formatées
                        if (count($data) >= 3) {

                            if ($id == $data[0]) {
                                // Titre du film
                                $title = htmlspecialchars($data[3]);
                              
                                $video = htmlspecialchars($data[2]); // Lien de la vidéo
                                break;
                            }

                        }}}}

            ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://e7.pngegg.com/pngimages/914/473/png-clipart-wikipedia-logo-wikimedia-project-w-miscellaneous-angle-thumbnail.png" type="image/x-icon">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            width: 80%;
            max-width: 800px;
            text-align: center;
        }
        .video-container {
            width: 100%;
            position: relative;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #ff6666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title"> <?php echo $title;?></h1>
        <style>
            .title {
                margin-bottom: 20px;
                text-shadow: 0 0 10px #ff0000;
                font-size: 2em;
            }
        </style>
        <div class="video-container">
    
            <iframe src="<?= $video ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <br><br><br>
        <a href="index.php" class="back-button">Back Home</a>
    </div>
</body>
</html>
