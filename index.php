<html>

<head>
    <link rel="stylesheet" href="./bootstrap.css">
    <script src="./bootstrap.js"></script>
</head>

<body>
    <?php
    include 'Classes/RealConvertor.php';
    $date = $_GET['date'];
    if ($date = NAN) {
        $convertor = new RealConvertor(date("m-d-Y"));
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
        <form action="index.php">
            <div class="row g-3 py-5 px-5">
                <input type="text" name="amount" class="form-control">
                <select name="from" id="from" class="form-select">
                    <?php foreach ($convertor->getCurrencies() as $currency => $value) : ?>
                        <option value="<?= $currency ?>"><?= $currency ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary w-100">=</button>
                <select name="to" id="from" class="form-select">
                    <?php foreach ($convertor->getCurrencies() as $currency => $value) : ?>
                        <option value="<?= $currency ?>"><?= $currency ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
        <p class="lead"><?php echo ("$amount $from = " . $convertor->convert($from, $to, $amount) . " $to"); ?></p>
        <?php
        if ($date == null) {
            echo "\nCurrent exchange rate: \n \t USD to: \n";
        } else {
            echo "\nExchange rate on date $date: \n \t USD to: \n";
        }
        foreach ($convertor->getCurrencies() as $currency => $value) {
            echo $currency . ' = ' . $value . ";\n";
        }; ?>
    </div>
</body>

</html>