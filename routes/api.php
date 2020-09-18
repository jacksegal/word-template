<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
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
