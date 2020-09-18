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


// Route::get('/ecard', function (Request $request) {

// 	$design = $request->query('design');
// 	$firstname = $request->query('firstname');
// 	$age = $request->query('age');
// 	$school = $request->query('school');
// 	$message = $request->query('message');

// 		// Creating the new document...
// 	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/Unicef-Epost-Word-Codes-1.docx'));

// 	$templateProcessor->setValue('firstname', $firstname);
// 	$templateProcessor->setValue('age', $age);
// 	$templateProcessor->setValue('school', $school);

// 	$templateProcessor->setValue('message', $message);

// 	$templateProcessor->setImageValue('design', array('path' => storage_path('app/ecard-1.png'), 'width' => '5cm', 'height' => '3cm', 'ratio' => false));

// 	$templateProcessor->saveAs(public_path('storage/'. time() . '.docx'));

// 	return response()->json([
// 		'design' => $design,
// 		'firstname' => $firstname,
// 		'age' => $age,
// 		'school' => $school,
// 		'message' => $message,
// 	]);
// });