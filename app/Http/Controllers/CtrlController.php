<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TCPDF;

class CtrlController
{
    public function plain()
    {
        return response('こんにちは、世界！', 200)
            ->header('Content-Type', 'text/html');

        // return 'こんにちは、世界！';
    }

    public function header()
    {
        return response()
            ->view('ctrl.header', ['books' => book::all()], 200)
            ->header('Content-Type', 'text/html');
    }

    public function outJson()
    {
        return response()
            ->json([
                'title' => 'Laravle実践入門',
                'publisher' => 'SBクリエイティブ',
                'price' => 4400,
            ]);

        // return response()
        //     ->json([
        //         'title' => 'Laravel実践入門',
        //         'publisher' => 'SBクリエイティブ',
        //         'price' => 4400,
        //     ])
        //     ->withCallback('callback');

        // return [
        //     'title' => 'Laravel実践入門',
        //     'publisher' => 'SBクリエイティブ',
        //     'price' => 4400,
        // ];
    }

    public function modelJson()
    {
        return Book::all();
    }

    public function download()
    {
        return response()->download('/home/user/dev/project/logo.jpg');

        // return response()->download(
        //     'C:/data/logo.png',
        //     'download.png',
        //     ['content-type' => 'image/png']
        // );

        // return response()->download(
        //     'C:/data/logo.png',
        //     'logo.png',
        //     ['content-type' => 'image/png'],
        //     'inline'
        // );

        // return response()->file('C:/data/logo.png', ['content-type' => 'image/png']);
    }

    public function pathNg(Request $request)
    {
        return response()->download($request->query('path'));
    }

    public function downloadStream()
    {
        return response()->streamDownload(function () {
            $output = fopen('php://output', 'w');
            fwrite($output, "\xEF\xBB\xBF");
            fwrite($output, "\xEF\xBB\xBF");
            fputcsv($output, ['id', 'ISBN', 'タイトル', '価格', '出版社', '刊行日',
                'サンプル', '作成日時', '更新日時']);
            Book::chunk(100, function ($books) use ($output) {
                foreach ($books as $book) {
                    fputcsv($output, array_values($book->toArray()), escape: '');
                }
                fflush($output);
                flush();
            });
            fclose($output);
        },'books.csv', ['Content-Type' => 'text/csv; charset=utf-8']);
    }
    public function redirectBasic()
    {
        $book = Book::find(5);
        return redirect('/hello/list');
        // return redirect()->route('books.index');
        // return redirect()->route('books.show', ['book' => 5]);
        // return redirect()->route('books.show', [$book]);
        // return redirect()->action([BookController::class, 'index']);
        // return redirect()->action([BookController::class, 'show'], ['book' => 5]);
        // return redirect()->away('https://wings.msn.to/');

        // return to_route('books.index');
        // return to_route('books.show', ['book' => 5]);
        // return to_route('books.show', [$book]);
    }

    public function input(Request $request)
    {
        $title = $request->input('title');
        // $title = $request->input('title', '無題');
        // $title = request('title', '無題');
        return "買取データ： {$title}";

        // $name = $request->input('author.0.name');
        // return "取得データ: {$name}";

        // $name = $request->input('author.*.name');
        // return "取得データ: " . implode(', ', $name);

        // $input = $request->input();
        // return var_dump($input);
    }

    public function inputType(Request $request)
    {
        return get_debug_type($request->string('title'));
        // return get_debug_type($request->integer('price', 0));
        // return get_debug_type($request->boolean('sample'));
        // return get_debug_type($request->date('published', 'Y-m-d', 'Asia/Tokyo'));
        // return get_debug_type($request->array('authors'));
        // return get_debug_type($request->enum('status', Status::class, Status::Draft));
    }

    public function reqHeaders(Request $request)
    {
        return view('ctrl.req_headers', [
            'headers' => $request->headers
            // 'headers' => $request->server()
        ]);


        // return $request->header('User-Agent', 'Unknown');

        // return $request->server('DOCUMENT_ROOT');
    }

    public function uploadForm()
    {
        return view('ctrl.upload_form');
    }

    public function uploadProcess(Request $request)
    {
        $request->validate([
            'photo' => 'required|array|max:5',
            'photo.*' => 'file|max:2048|mimes:jpg,jpeg,png'

            // 'photo.*' => 'required|image|dimensions:min_width=100,min_height=200,max_width=300,max_height=500,ratio=3/2',

            // 'photo.*' => [
            //     'required',
            //     'image',
            //     Rule::dimensions()
            //         ->minWidth(100)->maxWidth(300)
            //         ->minHeight(200)->maxHeight(500)
            //         ->ratio(3 / 2)
            // ],
        ]);

        $uploadedFiles = [];
        $failedFiles = [];

        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $index => $file) {
                if ($file->isValid()) {
                    try {
                        $originalName = $file->getClientOriginalName();
                        $fileName = time() . '_' . $index . '_' . $originalName;
                        $file->storeAs('uploads', $fileName);
                        $uploadedFiles[] = $originalName;

                        // Photo::create([
                        //     'original_name' => $file->getClientOriginalName(),
                        //     'mime_type' => $file->getMimeType(),
                        //     'file_size' => $file->getSize(),
                        //     'file_content' => $file->openFile()->fread($file->getSize()),
                        // ]);

                        // $path = $file->store('uploads', 'local');
                        // $uploadedFiles[] = basename($path);
                    } catch (Exception $e) {
                        $failedFiles[] = $file->getClientOriginalName();
                    }
                } else {
                    $failedFiles[] = $file->getClientOriginalName();
                }
            }
        }

        return redirect('/ctrl/upload_form')
            ->with('success', 'アップロード成功: ' . implode(', ', $uploadedFiles))
            ->with('fail', 'アップロード失敗: ' . implode(', ', $failedFiles));
    }

    public function downloadFile(Photo $photo)
    {
        return response()->streamDownload(function () use ($photo) {
            print($photo->file_content);
        }, $photo->original_name, [
            'Content-Type' => $photo->mime_type
        ]);
    }

    public function cookieForm(Request $request)
    {
        return view('ctrl.cookie_form', [
            'email' => $request->cookie('email', '')
            // 'email' => session('email', '')
            // 'email' => $request->session()->get('email', '')
        ]);
    }

    public function cookieProcess(Request $request)
    {
        return redirect('/ctrl/cookie_form')
            ->cookie('email', $request->email, 60 * 24 * 30);

        // session(['email' => $request->email]);
        // // $request->session()->put('email', $request->email);
        // return redirect('/ctrl/cookie_form');
    }

    public function deleteCookie()
    {
        return response('クッキー削除')->withoutCookie('email');
    }

    public function pdf(Response $response)
    {
        $pdf = new TCPDF(
            'P',    // ページの向き（P: 縦, L: 横）
            'mm',   // 単位（mm, pt, cm, in）
            'A4',   // フォーマット（A4, Letter等）
            true,   // Unicode文字の使用
            'UTF-8' // 文字エンコーディング
        );
        // ドキュメント情報の設定
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('WINGSプロジェクト');
        $pdf->SetTitle('PDFサンプルドキュメント');
        // 既定のヘッダー、フッターを無効化
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // フォントの設定（日本語対応）
        $pdf->SetFont('kozminproregular', '', 12);
        // ページを追加
        $pdf->AddPage();
        // コンテンツの追加
        $pdf->Cell(0, 10, 'PDF生成のサンプル', 0, 1, 'C');
        $pdf->Write(10, "このテキストは基本的なPDF生成のサンプルです。\n");
        // PDFの出力
        return response($pdf->Output('sample.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="sample.pdf"');
    }

}
