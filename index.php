<html>

<head>
    <link rel="stylesheet" href="./bootstrap.css">
    <script src="./bootstrap.js"></script>
</head>

<body>
    <?php
    include 'Classes/RealConvertor.php';
    $date = $_GET['date'];
    if ($date == NAN) {
        $convertor = new RealConvertor(date("Y-m-d"));
    } else {
        $convertor = new RealConvertor($date);
    }
    $amount = $_GET['amount'];
    $from = $_GET['from'];
    $to = $_GET['to']; ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Convertor</a>
        </div>
    </nav>
    <main class="container">
        <form action="index.php" class="needs-validation">
            <div class="row g-3 py-5">

                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Сколько">
                        <select name="from" id="from" class="form-select">
                            <?php foreach ($convertor->getCurrencies() as $currency => $value) : ?>
                                <option value="<?= $currency ?>"><?= $currency ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span type="submit" class="input-group-text">Сконвертировать в :</span>
                        <select name="to" id="from" class="form-select">
                            <?php foreach ($convertor->getCurrencies() as $currency => $value) : ?>
                                <option value="<?= $currency ?>"><?= $currency ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text">По курсу от</span>
                        <input class="form-control" type="date" name="date" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary bg-dark">Конвертация</button>
                </div>
            </div>
        </form>
        <p class="lead"><?php echo ("$amount $from = " . $convertor->convert($from, $to, $amount) . " $to"); ?></p>
        <?php
        if ($date == NAN || $date == date('Y-m-d')) {
            echo "\nCurrent exchange rate: \n \t USD to: \n";
        } else {
            echo "\nExchange rate on date $date: \n \t USD to: \n";
        }
        foreach ($convertor->getCurrencies() as $currency => $value) {
            echo $currency . ' = ' . $value . ";\n";
        }; ?>
    </main>
</body>

</html>