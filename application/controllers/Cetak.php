<?php 

require FCPATH . 'vendor/autoload.php';
use Faker\Factory;
class MYPDF extends TCPDF {

   //Page header
   public function Header() {
       // Logo
       $image_file = base_url().'assets/backend/images/otodidak.jpg';
    //    $this->Image($image_file, 7, 10, 5, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);
    if ($this->page == 1) {
        $html = '
        <small style="text-align:center"><strong><img src="'.$image_file.'" height="30px;"></strong></small>

        <h6 style="text-align:center">Otodidak Coffee</h6>

        <div style="text-align:center">
        <small>Jl. Raya Keadilan Ruko Perum Pesona Madani, Jl. Perumahan Qoryatussalam Sani Blk. A kelurahan No.14, Rangkapan Jaya Baru, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16434
         </small>
         </div>
         <hr>
    ';
    $this->writeHTML($html, true, false, true, false, '');
    }
       
   }

   // Page footer
   // public function Footer() {
   //     // Position at 15 mm from bottom
   //     $this->SetY(-15);
   //     // Set font
   //     $this->SetFont('helvetica', 'I', 8);
   //     // Page number
   //     $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
   // }
}

class Cetak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        if (!$this->session->userdata('username')) {
            redirect('forbidden');
        }
    }

    public function index()
    {

        $getID = $this->input->get('idorder');
        /** Get Order */
        $order = $this->order_model->getOrder($getID);
            
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dharma Karya');
        $pdf->SetTitle('Struk Pembelian #'.$getID);
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
        
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 0);
        
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        
        // set font
        $pdf->SetFont('dejavusans', '', 8);
        $pdf->SetMargins(5, 20, 5, true);
        // add a page
        $pdf->AddPage('P', 'A7');
        // test some inline CSS
        $strings = '';
        $totals = '';
        foreach ($order as $value) {
            $totals = $value->total_harga;
            $strings .= '<tr>
            <td align="left">'.$value->produk.'</td>
            <td align="center">'.$value->qty.'</td>
            <td align="right">'.number_format($value->harga*$value->qty,0,',','.').'</td>
            </tr>';
        }
        $html = '
        <br><br><br><br><br><br><br><br>
        
        <span>Date : '.date('d - m - Y').'</span><br>
        <span>Kasir : Andi </span>
        --------------------------------------------------------------
        <table>
        <tbody>
            '.$strings.'
        </tbody>
        <br>
        <tfoot>
            <tr>
                <td>Subtotal</td>
                <td></td>
                <td align="right">'.number_format($totals,0,',','.').'</td>
            </tr>
        </tfoot>
        </table>

        ';

        $pdf->writeHTML($html, true, false, true, false, 'center');        
        
        $pdf->lastPage();
        
        $pdf->Output('Struk Pembelian #'.$getID, 'I');
        
        //============================================================+
        // END OF FILE
        //============================================================+
    }
    
}
