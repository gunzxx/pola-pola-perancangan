<?php
class OldPrinter {
    public function printOld($text) {
        echo "Old Printer: " . $text;
    }
}


class NewPrinter {
    public function printNew($text) {
        echo "New Printer: " . $text;
    }
}


interface Printer {
    public function print($text);
}


class OldPrinterAdapter implements Printer {
    private OldPrinter $oldPrinter;

    public function __construct(OldPrinter $oldPrinter) {
        $this->oldPrinter = $oldPrinter;
    }

    public function print($text) {
        $this->oldPrinter->printOld($text);
    }
}


class NewPrinterAdapter implements Printer {
    private NewPrinter $newPrinter;

    public function __construct(NewPrinter $newPrinter) {
        $this->newPrinter = $newPrinter;
    }

    public function print($text) {
        $this->newPrinter->printNew($text);
    }
}


// $oldPrinter = new OldPrinter();
// $newPrinter = new NewPrinter();

$oldPrinterAdapter = new OldPrinterAdapter(new OldPrinter());
$newPrinterAdapter = new NewPrinterAdapter(new NewPrinter());

$oldPrinterAdapter->print("Hello, World!");
echo "\n";
$newPrinterAdapter->print("Hello, World!");
