<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocxtopdfController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PdfToWordController;
use App\Http\Controllers\DocumentPdfToWordController;
use App\Http\Controllers\jpgtopdfController;
use App\Http\Controllers\htmltopdfController;


Route::middleware(['auth'])->group(function () {
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/add-funds', [WalletController::class, 'addFunds'])->name('wallet.addFunds');
    Route::post('/wallet/withdraw-funds', [WalletController::class, 'withdrawFunds'])->name('wallet.withdrawFunds');
});


Route::post('/convert-pdf-to-word', [PdfToWordController::class, 'convert']);

// Route::controller(DocxtopdfController::class)->group(function(){
//   Route::get("doctopdfcon","create")->name("docx-to-pdf");
//   Route::post("doctopdfcon","doctopdfcon");
// });

Route::resource("docx-to-pdf",DocxtopdfController::class);
Route::post('/convert-to-pdf', [DocumentController::class, 'convert'])->name('convert-to-pdf');


Route::resource("jpg-to-pdf",jpgtopdfController::class);
// Route::post('/convert-to-pdf', [DocumentController::class, 'convert'])->name('convert-to-pdf');

Route::resource("html-to-pdf",htmltopdfController::class);
// Route::post('/convert-to-pdf', [DocumentController::class, 'convert'])->name('convert-to-pdf');

Route::resource("excel-to-pdf",exceltopdfController::class);


Route::resource("pdf-to-excel",pdftoexcelController::class);


Route::resource("pdf-to-jpg",pdftojpgController::class);

Route::resource("pdf-to-powerpoint",pdftopowerpointController::class);

Route::resource("pdf-to-word",pdftowordController::class);

Route::resource("powerpoint-to-pdf",powerpointtopdfController::class);

// Resource route for PDF to Docx conversion
//Route::resource('pdf-to-docx', PdfToWordController::class);

// Additional route for converting to Docx
//Route::post('/convert-to-docx', [DocumentPdfToWordController::class, 'convert'])->name('convert-to-docx');

//Route::post('/convert-pdf-to-word', [PdfToWordController::class, 'convert'])->name('convert-pdf-to-word');

//Route::post('/convert-gif', [GifController::class, 'convert']);
// Route::get('/upload', function () {
//     return view('frontend.convertfile.upload');
// })->name('frontend.convertfile.upload');

//Route::get('/upload-html', [HtmlToPdfController::class, 'showForm'])->name('upload.form');
//Route::post('/upload-html', [HtmlToPdfController::class, 'uploadHtml'])->name('upload.html');


