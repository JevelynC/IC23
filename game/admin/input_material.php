<?php
include '../../connect.php';
$error_mess = false;
if (!isset($_SESSION['nrp_admin']) || $_SESSION['nrp_admin'] == "") {
    header("Location: index.php");
    exit();
}

$query = $conn->prepare('SELECT * FROM game_kelompok');
$query->execute();

$listKelompok = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" rel="stylesheet"
        integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
    </script>

    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js">
    </script>

    <link rel="stylesheet" href="asset/style_input.css">

    <!-- fav icon -->
    <link rel="icon" type="image/png" href="../../assets/logo%20ic.png">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Input Material</title>
</head>

<body>
    <?php
    if (isset($_SESSION['delay']) && $_SESSION['delay'] == true) {
        ?>

        <script>
            let timerInterval;
            Swal.fire({
                title: "Please wait ^^",
                html: "I will close in <b></b> milliseconds.",
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        </script>

        <?php
        $_SESSION['delay'] = false;
    }
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand col-2" href="#">
                <img src="asset/img/logo_petra.jpg" alt="" width="55" height="55">
                <span style="padding-left: 10px;">Input Website</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="row w-100">
                    <div class="col-9 d-flex justify-content-left">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="input_material.php">Input</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="history.php">History</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li> -->

                        </ul>
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <a class="navbar-brand" href="api/logout.php"> Log Out
                            <ion-icon name="exit-outline" id="exit"></ion-icon>
                        </a>
                        <!-- <ul class="navbar-nav">
                            <li class="nav-item">
                                log out
                            </li>
                        </ul> -->
                    </div>
                </div>


            </div>
        </div>
    </nav>

    <br> <br>

    <div>
        <?php if (isset($_SESSION['nama_poss'])) {
            $_SESSION['pickpos'] = true;
            echo '<h1> Login di Pos ' . $_SESSION['nama_poss'] . '</h1>';
        } else {
            $_SESSION['pickpos'] = false;
        }
        ?>
    </div>


    <label for="fruitSelect" class="keterangan full-container" style="text-align: center;"> KETERANGAN POS : </label>
    <div class="full-container">
        <form action="api/setpost.php" method="post">
            <select class="selectpicker full-container" name="poss" id="poss" data-live-search="true">
                <option value="Remember Me">Remember Me</option>
                <option value="Kompak Please">Kompak Please</option>
                <option value="Mind The Mines">Mind The Mines</option>
                <option value="Pass My Way">Pass My Way </option>
                <option value="Toss tic tac tumble">Toss tic tac tumble</option>
                <option value="Blow For victory">Blow For victory</option>
                <option value="Whos fast?">Whos fast?</option>
                <option value="Run and Run">Run and Run</option>
                <option value="A glimpse of hope">A glimpse of hope</option>
                <option value="Binding Tower">Binding Tower</option>
                <option value="Flowing Ball">Flowing Ball</option>
                <option value="Multi drawers">Multi drawers</option>
                <option value="Tactile Whispers">Tactile Whispers</option>
                <option value="Rubber Bond">Rubber Bond</option>
                <option value="Lets Have Fun">Lets Have Fun</option>
                <option value="Find My Pair">Find My Pair </option>
            </select>

            <span class="btn mt-3 justify-content-center">
                <button class="btn btn-primary" type="submit" id="submitpos" name="submitpos">submit</button>
            </span>
        </form>
    </div>


    <div class="container-fluid mt-5">
        <div class="container" id="menang">
            <span class="garis">
                <h2 style="margin-top: 20px;">KELOMPOK MENANG</h2>
                <hr class="horiline">
            </span>
            <label for="fruitSelect" class="judul"> List Nama Kelompok : </label>
            <br>
            <form action="api/insertmenang.php" method="post">
                <select class="selectpicker" id="fruitSelect" name="fruitselectmenang" data-live-search="true">
                    <option selected>Pilih kelompok</option>
                    <?php foreach ($listKelompok as $value) { ?>
                        <option value="<?= $value['nama'] ?>">
                            <?= $value['nama'] ?>
                        </option>
                    <?php } ?>
                </select>

                <br></br>

                <?php
                if ($_SESSION['pickpos'] == true) {
                    if (isset($_SESSION['kelompok'])) {
                        echo ' <div class="alert alert-success" role="alert"> 
                            berhasil input data kelompok ' . $_SESSION['kelompok'] .
                            '</div>';
                    }
                } else if ($_SESSION['pickpos'] == false) {
                    echo ' <div class="alert alert-danger" role="alert">
                            Pilih Pos Login' .
                        '</div>';
                }
                ?>


                <span class="btn">
                    <input class="btn btn-primary" value="submit" type="submit" id="submitmenang" name="submitmenang"
                        onclick="submit()">
                </span>

            </form>
        </div>

        <div class="container" id="seri">
            <span class="garis">
                <h2 style="margin-top: 20px;">KELOMPOK SERI</h2>
                <hr class="horiline">
            </span>

            <label for="fruitSelect" class="judul"> List Nama Kelompok : </label>
            <br>
            <form action="api/insertseri.php" method="post">
                <select class="selectpicker" id="fruitSelect" name="fruitselectseri" data-live-search="true">
                    <option selected>Pilih kelompok</option>
                    <?php foreach ($listKelompok as $value) { ?>
                        <option value="<?= $value['nama'] ?>">
                            <?= $value['nama'] ?>
                        </option>
                    <?php } ?>
                </select>

                <br></br>

                <?php
                if ($_SESSION['pickpos'] == true) {
                    if (isset($_SESSION['kelompokseri'])) {
                        echo ' <div class="alert alert-success" role="alert"> 
                            berhasil input data kelompok ' . $_SESSION['kelompokseri'] .
                            '</div>';
                    }
                } else if ($_SESSION['pickpos'] == false) {
                    echo ' <div class="alert alert-danger" role="alert">
                            Pilih Pos Login' .
                        '</div>';
                } ?>

                <span class="btn">
                    <button class="btn btn-primary" type="submit" value="submit" id="submitseri"
                        name="submitseri">Submit</button>
                </span>
            </form>
        </div>

        <div class="container" id="kalah">
            <span class="garis">
                <h2 style="margin-top: 20px;">KELOMPOK KALAH</h2>
                <hr class="horiline">
            </span>

            <label for="fruitSelect" class="judul"> List Nama Kelompok : </label>
            <br>
            <form action="api/insertkalah.php" method="post">
                <select class="selectpicker" id="fruitSelect" name="fruitselectkalah" data-live-search="true">
                    <option selected>Pilih kelompok</option>
                    <?php foreach ($listKelompok as $value) { ?>
                        <option value="<?= $value['nama'] ?>">
                            <?= $value['nama'] ?>
                        </option>
                    <?php } ?>
                </select>

                <br></br>

                <?php
                if ($_SESSION['pickpos'] == true) {
                    if (isset($_SESSION['kelompokkalah'])) {
                        echo ' <div class="alert alert-success" role="alert"> 
                            berhasil input data kelompok ' . $_SESSION['kelompokkalah'] .
                            '</div>';
                    }
                } else if ($_SESSION['pickpos'] == false) {
                    echo ' <div class="alert alert-danger" role="alert">
                            Pilih Pos Login' .
                        '</div>';
                } ?>


                <span class="btn">
                    <button class="btn btn-primary" type="submit" value="submit" id="submitkalah"
                        name="submitkalah">Submit</button>
                </span>
            </form>
        </div>

    </div>

    <script>
        function submit() {

        }
    </script>
    <!-- Tambahkan link ke jQuery (diperlukan oleh Bootstrap dan Bootstrap-select) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan link ke Bootstrap JS (diperlukan oleh Bootstrap-select) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <!-- Tambahkan link ke Bootstrap-select JS -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
</body>

</html>
