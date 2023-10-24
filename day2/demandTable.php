<?php require_once("../connect.php");

// if(!isset($_SESSION['nama_kelompok']) || $_SESSION['nama_kelompok'] == ""){
//     header("Location: login.php");
//     exit;
?>

<?php
$sql = "SELECT * FROM day2_demandtable dt
JOIN day2_day dd ON dt.day=dd.day";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();
//var_dump($data);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">  

<style>
    #tabel{
        /* font-family: 'Inter Tight', sans-serif; */
        font-family: 'PT Serif', serif;
    }
    #judul{
        /* font-family: 'Gentium Book Plus', serif; */
        font-family: 'PT Serif', serif;
    }
    /* .thead{
        height: 100px;
        justify-content: center;
        text-align: center;
        padding-bottom: 10px;
        vertical-align: center; }*/

    
</style>
</head>


  <body class="bg-primary">  
    <!-- <pre>
        <?php
        print_r($data);
         ?>
    </pre> -->
    <section class= " p-5">
        <div class="container bg-dark p-4 text-light text-center" id="judul">
            <h1 >STARLIGHT ODYSSEY</h1>
        </div>
        <div class="container bg-dark py-4 px-4 text-light text-center" id="tabel">
        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead">
                <tr>
                    <th>Cruiser</th>
                    <th>Cyclone</th>
                    <th>Stellar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td> <?= $data['starlight_cruiser']; ?></td>
                    <td> <?php echo $data['starlight_cyclone']; ?></td>
                    <td> <?= $data['starlight_stellar']; ?></td>
        
                </tr>
            </tbody>
        </table>
  </tbody>
</table>
        </div>

    </section>

    <section class= " p-5">
        <div class="container bg-dark p-4 text-light text-center" id="judul">
            <h1 >CELESTIAL FLARE</h1>
        </div>
        <div class="container bg-dark py-4 px-4 text-light text-center" id="tabel">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead">
                <tr>
                    
                    <th>Cruises</th>
                    <th>Cyclone</th>
                    <th>Stellar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data['celestial_cruiser'];?></td>
                    <td><?= $data['celestial_cyclone'];?></td>
                    <td><?= $data['celestial_stellar'];?></td>
                </tr>
            </tbody>
        </table>
  </tbody>
</table>
        </div>

    </section>

    <section class= " p-5">
        <div class="container bg-dark p-4 text-light text-center" id="judul">
            <h1 >STARRY TWILIGHT</h1>
        </div>
        <div class="container bg-dark py-4 px-4 text-light text-center" id="tabel">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    
                    <th>Cruises</th>
                    <th>Cyclone</th>
                    <th>Stellar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data['starry_cruiser'];?></td>
                    <td><?= $data['starry_cyclone'];?></td>
                    <td><?= $data['starry_stellar'];?></td>
                </tr>
            </tbody>
        </table>
  </tbody>
</table>
        </div>

    </section>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>