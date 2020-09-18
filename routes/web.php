<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('form');
});


Route::any('/pdf', function (Request $request) {
	
	// $design = $request->query('design');
	$key = $request->input('key');
	$firstname = $request->input('firstname');
	$age = $request->input('age');
	$school = $request->input('school');
	$message = $request->input('message');

	$dompdf = new Dompdf();

	$options = $dompdf->getOptions();
	$options->setIsRemoteEnabled(true);
	$dompdf->setOptions($options);

	//return view('postcard', compact('firstname', 'age', 'school', 'message'))->render();

	$html = view('postcard', compact('firstname', 'age', 'school', 'message'))->render();
	$dompdf->loadHtml($html);
	
	$dompdf->setPaper('A4', 'landscape');
	$dompdf->render();
	// $dompdf->stream();
	$content = $dompdf->output();

    try {

        $filename = 'cop26-ecard-'. $key . 'pdf';
        $filePath = 'digital-activist/'.$filename;

        $response = Storage::disk('spaces')->put($filePath, $content, 'public');
        return response()->json(['src'=> Storage::cloud()->url($filePath)]);

    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }	
});

Route::get('/ecard', function (Request $request) {

	$design = $request->query('design');
	$firstname = $request->query('firstname');
	$age = $request->query('age');
	$school = $request->query('school');
	$message = $request->query('message');

		// Creating the new document...
	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/Unicef-Epost-Word-Codes-1.docx'));

	$templateProcessor->setValue('firstname', $firstname);
	$templateProcessor->setValue('age', $age);
	$templateProcessor->setValue('school', $school);

	$templateProcessor->setValue('message', $message);

	$templateProcessor->setImageValue('design', array('path' => storage_path('app/ecard-1.png'), 'width' => '5cm', 'height' => '3cm', 'ratio' => false));

	$templateProcessor->saveAs(public_path('storage/'. time() . '.docx'));

	return response()->json([
		'design' => $design,
		'firstname' => $firstname,
		'age' => $age,
		'school' => $school,
		'message' => $message,
	]);
});