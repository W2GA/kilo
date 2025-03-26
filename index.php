<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wahid Watch</title>
    <link rel="icon" href="https://e7.pngegg.com/pngimages/914/473/png-clipart-wikipedia-logo-wikimedia-project-w-miscellaneous-angle-thumbnail.png" type="image/x-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }
        img {
            max-width: 100%;
            height: 80%;
        }

        h1 {
            margin-bottom: 20px;
        }
        .movie-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .movie {
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 10px;
        }
        .movie img {
            width: 100%;
            border-radius: 10px;
        }
        .movie h3 {
            margin-top: 10px;
        }
        img:hover {
            transform: scale(1.1);
            transition: transform 1s;
        }
        
        a {
            color: #ff0000;
            text-decoration: none;
        }
        a:hover {
            color: #ff6666;
        }
        @media screen and (min-width: 768px) {
            .movie-list {
                grid-template-columns: repeat(6, 1fr);
            }
            
        }
        @media screen and (max-width: 350px) {
            .movie-list {
                grid-template-columns: repeat(2, 1fr);
            }
            
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Wahid Watch</h1>
        <style>
            .title {
                margin-bottom: 20px;
                text-shadow: 0 0 10px #ff0000;
                font-size: 2em;
            }
        </style>
        <div class="movie-list">
            <?php 
            $filename = 'data.txt';

            if (file_exists($filename)) {
                $file = fopen($filename, 'r');
                if ($file) {
                    while (($line = fgets($file)) !== false) {
                        $data = explode('|&@wahid@&|', trim($line));

                        // Vérifier si les données sont bien formatées
                        if (count($data) >= 3) {
                            $id = htmlspecialchars($data[0]); // ID du film
                            $titre = htmlspecialchars($data[3]); // Titre du film
                            $image = htmlspecialchars($data[1]); // Lien de l'image

                            echo '<div class="movie">';
                            echo '<a href="watch.php?id=' . $id . '">';
                            echo '<img src="' . $image . '" alt="' . $titre . '">';
                            echo '<h3 class="titre_film">' . $titre . '</h3>';
                            echo '</a>';
                            echo '</div>';
                        }
                    }
                    fclose($file);
                } else {
                    echo "<p>Impossible d'ouvrir le fichier.</p>";
                }
            } else {
                echo "<p>Le fichier n'existe pas.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
