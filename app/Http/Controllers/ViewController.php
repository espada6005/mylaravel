<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Book;

class ViewController extends Controller
{
    public function escape()
    {
        return view('view.escape', [
            'message' => '<h3>WINGSプロジェクト</h3><img src="https://www.web-deli.com/image/linkbanner_l.gif" alt="ロゴ" />'
        ]);
    }

    public function showDouble()
    {
        return view('view.show_double', [
            'message' => '<Tom &amp; Jerry>'
        ]);
    }

    public function showSwitch()
    {
        return view('view.show_switch', [
            'random' => random_int(1, 5)
        ]);
    }

    public function assoc(int $id)
    {
        return view('view.assoc',
            ['book' => Book::find($id, ['*'])->toArray()]);
    }

    public function foreachLoop()
    {
        return view('view.foreach_loop', [
            'labels' => ['大安', '赤口', '先勝', '友引', '先負', '仏滅']
        ]);
    }

    public function setClass()
    {
        return view('view.set_class', [
            'isOn' => true
        ]);
    }

    public function setStyle()
    {
        return view('view.set_style', [
            'isOn' => true
        ]);
    }

    public function selected()
    {
        return view('view.selected', [
            'current' => now(),
        ]);
    }

    public function compBasic()
    {
        return view('view.comp_basic', [
            'title' => 'Laravelからのおしらせ',
        ]);
    }

    public function slotTemplate()
    {
        return view('view.slot_template', [
            'books' => Book::all()
        ]);
    }

    public function compDynamic()
    {
        $componentDir = resource_path('views/components');
        $bannerFiles = collect(File::files($componentDir))
            ->filter(fn($file) => str_starts_with($file->getFilename(), 'banner'))
            ->map(fn($file) => str_replace('.blade.php', '', $file->getFilename()))
            ->all();
        $selectedBanner = $bannerFiles ?
            $bannerFiles[array_rand($bannerFiles)] : 'banner1';

        return view('view.comp_dynamic', [
            'banner' => $selectedBanner,
        ]);
    }

    public function collection()
    {
        return view('view.collection', [
            'books' => Book::all()
        ]);
    }

    public function creator()
    {
        return view('view.creator')
            ->with('subject', 'ページ固有のタイトル');
    }
}
