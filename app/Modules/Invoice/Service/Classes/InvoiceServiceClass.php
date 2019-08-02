<?php

namespace App\Modules\Invoice\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Generic\Traits\FileUpload;
use App\Modules\Invoice\Model\Invoice;
use App\Modules\Invoice\Repository\Interfaces\InvoiceInterface;
use App\Modules\Invoice\Service\Interfaces\InvoiceServiceInterface;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\ImagickEscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mpdf\Mpdf;
use PHPUnit\Util\Printer;

class InvoiceServiceClass extends BaseServiceClass implements InvoiceServiceInterface
{
    use FileUpload;

    /**
     * @var
     */
    protected $repository;

    /**
     * InvoiceServiceClass constructor.
     * @param InvoiceInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(InvoiceInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param $reservation
     * @author Nader Ahmed
     * @return mixed
     */
    public function printInvoc($reservation)
    {
        $array = ['schedule_id' => $reservation->id];

        $invoice = $this->repository->store($array);

        $htmlContent = view("invoice.reservation_invo", compact(["reservation","invoice"]))->render();

        $pdf = $this->generatePdf($htmlContent,$reservation->client_id);

        $this->repository->update($invoice->id,['pdf'=>$pdf]);

        $this->print($pdf);
    }

    /**
     * @param $cart
     * @param $client_id
     * @param $order
     * @author Nader Ahmed
     */
    public function printInvocToOrder($cart , $request,$order)
    {
        $array = ['order_id' => $order->id];
        $invoice = $this->repository->store($array);

        $htmlContent = view("invoice.order_invo", compact(["order","invoice"]))->render();

        $pdf = $this->generatePdf($htmlContent,$request['client_id']);

        $this->repository->update($invoice->id,['pdf'=>$pdf]);

        $this->print($pdf);
    }
    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Invoices());
        return true;
    }

    private function print($pdf){
        $connector = new FilePrintConnector("php://stdout");
        $printer = new Printer($connector);
        try {
            $pages = ImagickEscposImage::loadPdf($pdf, 540);
            foreach ($pages as $page) {
                $printer -> graphics($page, Printer::IMG_DOUBLE_HEIGHT | Printer::IMG_DOUBLE_WIDTH);
            }
            $printer -> cut();
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        } finally {
            $printer->close();
        }

    }

    private function generatePdf($htmlContent,$client_id)
    {
        $settings = get_settings();
        $mpdf = new Mpdf(
            [
                'mode' => 'utf-8',
                'autoArabic' => true,
                'forcePortraitHeaders' => false,
                'format' =>'A4-L',
                'margin_top' => 0,
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_bottom' => 0,
            ]
        );
        if(!empty($settings['logo'])){
            $mpdf->imageVars['logo'] = file_get_contents( public_path($settings['logo']->value));
        }
        $mpdf->showImageErrors = true;
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->useAdobeCJK = true;
        $mpdf->WriteHTML($htmlContent);

        $file_name = $client_id . '_' . date('Y-m-d h:i:sa') . '_' . '.pdf';
        $mpdf->Output('invoice/'.$file_name,'F');
        return 'invoice/'.$file_name;
    }
}

