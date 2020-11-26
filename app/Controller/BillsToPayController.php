<?php
namespace Mini\Controller;

use Mini\Model\BillsToPay;
use Fpdf\Fpdf;

class BillsToPayController
{
    public function index()
    {
        $BillsToPay = new BillsToPay();
        
        $billstopay = $BillsToPay->getAllContasPagar();

        require APP . 'view/_templates/header.php';
        require APP . 'view/contasapagar/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function add()
    {
        if (isset($_POST["submit_add_billstopay"])) {
            $BillsToPay = new BillsToPay();
            $BillsToPay->add(
                $_POST["descrition"], 
                $_POST["providerId"],
                $_POST["price"], 
                $_POST["releaseDate"],
                $_POST["dueDate"],
                $_POST["status"],
                $_POST["created_at"],
                $_POST["updated_at"]);
        }

        header('location: ' . URL . 'contasapagar/index');
    }

    public function delete($billstopay_id)
    {
        if (isset($billstopay_id)) {
            $BillsToPay = new BillsToPay();
            $BillsToPay->delete($billstopay_id);
        }

        header('location: ' . URL . 'contasapagar/index');
    }

    public function edit($billstopay_id)
    {
        if (isset($billstopay_id)) {
            $BillsToPay = new BillsToPay();
            $billstopay = $BillsToPay->getBillsToPay($billstopay_id);

            if ($billstopay === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/contasapagar/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            header('location: ' . URL . 'contasapagar/index');
        }
    }

    public function update()
    {
        if (isset($_POST["submit_update_billstopay"])) {

            $BillsToPay = new BillsToPay();

            $BillsToPay->update(                
                $_POST["descrition"], 
                $_POST["providerId"],
                $_POST["price"], 
                $_POST["releaseDate"],
                $_POST["dueDate"],
                $_POST["status"],
                $_POST["created_at"],
                $_POST["updated_at"], 
                $_POST['billstopay_id']);
        }

        header('location: ' . URL . 'contasapagar/index');
    }
    public function generetePdf()
    {
        $pdf = new Fpdf();
        $relatorio = new ContasPagar();
        $todos = $relatorio->getAllContasPagar();

        foreach ($todos as $td):
            $pdf->Cell(5,1, $td['id'], 1, 0, 'L');
            $pdf->Cell(5,1, $td['nameFornecedor'], 1, 1, 'L');
            $pdf->Cell(5,1, $td['descrition'], 1, 0, 'L');
            $pdf->Cell(5,1, $td['price'], 1, 1, 'L');
            $pdf->Cell(5,1, $td['releaseDate'], 1, 1, 'L');
            $pdf->Cell(5,1, $td['dueDate'], 1, 1, 'L');
            $pdf->Cell(5,1, $td['status'], 1, 1, 'L');
            $pdf->Cell(5,1, $td['price'], 1, 1, 'L');
            $pdf->Cell(5,1, $td['created_at'], 1, 1, 'L');
            $pdf->Cell(5,1, $td['updated_at'], 1, 1, 'L');


        endforeach;
        
        $pdf->Output('relatorioContasPagar.pdf', 'D');
    }

}
