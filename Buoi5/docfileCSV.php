<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        if (($open = fopen("dulieuShoppee.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) != FALSE) {
                $array[] = $data;
            }
            fclose($open);
        }
    ?>
    <div class="container">
        <div class="row">
            <?php
                  foreach ($array as $sub ) {
                    echo '
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="'.$sub[2].'" alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title">'.$sub[1].'</h5>
                                <p class="card-text">'.$sub[3].'</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                        </div>
                    ';
                  }
            ?>
            
        </div>
    </div>
    
</body>
</html>