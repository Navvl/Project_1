<?php

namespace App\Controllers;
use App\Models\M_PKL;
use Dompdf\Dompdf;
use TCPDF;


class Home extends BaseController
{
	public function tampilan()
	{
		$model = new M_PKL();
		$data['elvan']=$model->tampil('tblprint');
			
		return view('tampilan', $data);
	}
	public function print()
{
    $model = new M_PKL();
    // Instantiate TCPDF
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('CodeIgniter TCPDF');
    $pdf->SetAuthor('Your');
    $pdf->SetTitle('Contoh Print');

    // Add a page
    $pdf->AddPage('L', 'A4');

    // Set content
    $data = [
		'elvan' => $model->tampil('tblprint'),
		'startcolumn' => 'your_startcolumn_value', // Ganti 'your_startcolumn_value' dengan nilai yang sesuai
	];
	
	
	$html = view('print', $data);
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // Close and output PDF
    $pdf->Output('contoh_print.pdf', 'I'); // I for inline display, D for download
}


}