<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('pdf', function () {

	$dompdf = new Dompdf();
	$dompdf->loadHtml('<h1>hello world</h1>');
	$dompdf->setPaper('A5', 'landscape');

	$output = $dompdf->output();
	file_put_contents(storage_path('app/pdf/test.pdf'), $output);
	// Storage::put('pdf/'.time(). '_dompdf.pdf', $output);

})->purpose('Display an inspiring quote');


Artisan::command('word', function () {
    
	// Creating the new document...
	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/Unicef-Epost-Word-Codes-1.docx'));

	$templateProcessor->setValue('firstname', 'Jack');
	$templateProcessor->setValue('age', '12');
	$templateProcessor->setValue('school', 'Royston');

	$templateProcessor->setValue('message', "I'm baby jianbing pour-over +1 hexagon, flannel pitchfork cred letterpress slow-carb mixtape cloud bread. Shabby chic leggings yuccie, beard tote bag bitters blog copper mug poke.");

	$templateProcessor->setImageValue('design', array('path' => storage_path('app/ecard-1.png'), 'width' => '5cm', 'height' => '3cm', 'ratio' => false));

	$filename = time() . '.docx';

	$templateProcessor->saveAs(storage_path('app/'. $filename));

	\PhpOffice\PhpWord\Settings::setPdfRendererPath('vendor/dompdf/dompdf');
	\PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

	$temp = \PhpOffice\PhpWord\IOFactory::load(storage_path('app/'. $filename));
	$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($temp , 'PDF');
	$xmlWriter->save(storage_path('app/'. time() .'_converted.pdf'), TRUE);	
	//Load export library
	// $domPdfPath = base_path( 'vendor/dompdf/dompdf');
	// \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
	// \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
	
	// //load generated file
	// $phpWord = \PhpOffice\PhpWord\IOFactory::load(storage_path('app/'. $filename)); 
	// //generate the pdf converter class
	// $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
	// //save generated File
	// $pdfLocation = storage_path('app/public/'.time().'_converted.pdf');
	// $xmlWriter->save($pdfLocation, true);


})->purpose('Display an inspiring quote');
