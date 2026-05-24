<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Member;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class QueryController extends Controller
{
    public function where()
    {
        $books = Book::where('publisher', 'SBクリエイティブ')->get();
        return view('hello.list', ['books' => $books]);
    }

    public function json()
    {
        $members = Member::where('info->sns', 'facebook')->get();
        // $members = Member::whereJsonContains('info->languages', 'ja')->get();
        // $members = Member::whereJsonLength('info->languages', '>', 1)->get();
        return view('query.json', ['members' => $members]);
    }

    public function whereAnd()
    {
        $books = Book::where('publisher', 'SBクリエイティブ')
            ->where('price', '<', 4000)->get();
        // $books = Book::where([
        //     ['publisher', 'SBクリエイティブ'],
        //     ['price', '<', 4000]
        // ])->get();
        return view('hello.list', ['books' => $books]);
    }

    public function whereOr()
    {
        $books = Book::where('publisher', 'SBクリエイティブ')
            ->orWhere('price', '<', 4000)->get();

        return view('hello.list', ['books' => $books]);
    }

    public function whereAndOr()
    {
        $books = Book::where('publisher', 'SBクリエイティブ')
            ->where(function (Builder $query) {
                $query->where('price', '<', 4000)
                    ->orWhere('sample', true);
            })->get();

        // $price = 4000;
        // $sample = true;
        // $books = Book::where('publisher', 'SBクリエイティブ')
        //     ->where(function (Builder $query) use ($price, $sample) {
        //         $query->where('price', '<', $price)
        //               ->orWhere('sample', $sample);
        //     })->get();
        return view('hello.list', ['books' => $books]);
    }

    public function whereNot()
    {
//        $books = Book::whereNot('publisher', 'SBクリエイティブ')->get();
        $books = Book::whereDate('published', '<=', today())
            ->whereNot(function (Builder $query) {
                $query->whereLike('title', '%入門%')
                    ->orWhere('sample', true);
            })->get();
        return view('hello.list', ['books' => $books]);
    }

    public function whereAny()
    {
//        $articles = Article::whereAny(
        $articles = Article::whereAll(
            ['subject', 'body', 'summary'], 'LIKE', '%入門%')->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function whereAvg()
    {
        $ave = Book::where('publisher', 'SBクリエイティブ')->avg('price');
//         $ave = Book::avg('price');
        return "平均価格: {$ave}円";
    }

    public function whereExists()
    {
        $flag = Book::where('price', '>', 4000)->exists();
        return $flag ? '存在する' : '存在しない';
    }

    public function order()
    {
        $books = Book::where('title', 'LIKE', '%入門')
            ->orderBy('published', 'desc')->get();
        return view('hello.list', ['books' => $books]);
    }

    public function orderReset()
    {
        $books = Book::where('title', 'LIKE', '%入門')
            ->orderBy('published', 'desc')
            ->orderBy('price')
//            ->reorder('title')
            ->get();
        return view('hello.list', ['books' => $books]);
    }

    public function randomOrder()
    {
        $book = Book::inRandomOrder()->first();
        return view('books.show', ['book' => $book]);
    }

    public function latest()
    {
        $books = Book::latest()->get();
        return view('hello.list', ['books' => $books]);
    }

    public function limit()
    {
        $books = Book::orderBy('published', 'desc')
            ->offset(4)
            ->limit(3)
            ->get();
        return view('books.index', ['books' => $books]);
    }

    public function page(int $id = 1)
    {
        $size = 3;
        $books = book::orderBy('published', 'desc')
            ->offset(($id - 1) * $size)
            ->limit($size)
            ->get();
        return view('books.index', ['books' => $books]);
    }

    public function pager()
    {
//        $books = Book::orderBy('published', 'desc')
//            ->paginate(3);

//        $books = Book::orderBy('published', 'desc')
//            ->simplePaginate(3);

//        $books = Book::orderBy('published', 'desc')
//            ->paginate(3)
//            ->withPath('/hello/list')
//            ->appends(['sort' => 'price']);

        $books = Book::orderBy('published', 'desc')->paginate(3, pageName: 'bid');
        return view('books.index', ['books' => $books]);
    }

    public function select()
    {
        $books = Book::where('publisher', 'SBクリエイティブ')
            ->select('title', 'price', 'publisher AS pub')
            ->get();
        return view('query.select', ['books' => $books]);
    }

    public function selectRaw()
    {
        // エラーになる
        // $books = Book::where('publisher', 'SBクリエイティブ')
        // ->select(
        //     'SUBSTR(title, 1, 5) AS short_title',
        //     'price * 1.10 AS taxed_price'
        // )
        // ->get();

        $books = Book::where('publisher', 'SBクリエイティブ')
            ->select(
                DB::raw('SUBSTR(title, 1, 5) AS short_title'),
                DB::raw('price * 1.10 AS taxed_price')
            )->get();

        // ->selectRaw('SUBSTR(title, 1, 5) AS short_title, price * 1.10 AS taxed_price')
        // ->get();

        // ->selectRaw('SUBSTR(title, ?, ?) AS short_title, price * ? AS taxed_price', [1, 5, 1.10])
        // ->get();
        return view('query.select_raw', ['books' => $books]);
    }

    public function distinct()
    {
        $books = Book::select('publisher')->distinct()->get();
        return view('query.distinct', ['books' => $books]);

        // $books = Book::distinct()->pluck('publisher');
        // return view('query.distinct2', ['books' => $books]);
    }

    public function groupby()
    {
        $books = Book::groupBy('publisher')
            ->selectRaw('publisher, AVG(price) as average')
            ->get();
        return view('query.groupby', ['books' => $books]);
    }

    public function having()
    {
        $books = Book::groupBy('publisher')
            ->having('average', '>', 3500)
            ->selectRaw('publisher, AVG(price) as average')
            ->get();
        return view('query.groupby', ['books' => $books]);
    }

    public function union()
    {
        $sampled = Book::where('sample', true);
        $books = Book::where('price', '<', 3500)
            ->union($sampled)->get();
        return view('hello.list', ['books' => $books]);
    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        $sample = $request->input('sample');

        $books = Book::when($title, function ($query, $title) {
            return $query->where('title', 'LIKE', "%{$title}%");
        })->when($sample, function ($query, $sample) {
            return $query->where('sample', true);
        },
            function ($query, $sample) {
                return $query->where('sample', false);
            }
        )->get();
        return view('query.search', ['books' => $books]);
    }

    public function subSingle(Request $request)
    {
        $books = Book::where('price', '<',
            function (QueryBuilder $query) {
                $query->from('books')->selectRaw('AVG(price)');
            }
        )->get();
        return view('hello.list', ['books' => $books]);
    }

    public function subMulti()
    {
        $books = Book::whereIn('id', function (QueryBuilder $query) {
            $query->from('reviews')->where('created_at', '>', '2024-06-25')
                ->select('book_id')->distinct();
        })->get();

        // $books = Book::whereExists(function (QBuilder $query) {
        //     $query->from('reviews')
        //         ->where('created_at', '>', '2024-06-25')
        //         ->whereColumn('reviews.book_id', 'books.id')
        //         ->selectRaw('1');
        // })->get();
        return view('hello.list', ['books' => $books]);
    }

    public function scopedLocal()
    {
        $books = Book::sbc()->newer(5)->get();
        // $books = Book::sbcNewer()->get();
        return view('hello.list', ['books' => $books]);
    }

    public function scopedGlobal()
    {
        return view('reviews.index', ['reviews' => Review::all()]);
    }

    public function scopedWithout()
    {
        $reviews = Review::withoutGlobalScope('newer')->get();
        return view('reviews.index', ['reviews' => $reviews]);
    }

    public function createId()
    {
        $id = Book::insertGetId([
            'isbn' => '978-4-297-14766-2',
            'title' => '3ステップで学ぶ Python 入門',
            'price' => 2970,
            'publisher' => '技術評論社',
            'published' => '2025-03-19',
            'sample' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return to_route('books.show', ['book' => $id]);

        // $book = new Book();
        // $book->isbn = '978-4-297-14766-2';
        // $book->title = '3ステップで学ぶ Python 入門';
        // $book->price = 2970;
        // $book->publisher = '技術評論社';
        // $book->published = '2025-03-19';
        // $book->sample = false;
        // $book->save();
        // return to_route('books.show', ['book' => $book->id]);
    }

    public function insertOr()
    {
        Book::insertOrIgnore([
            [
                'id' => 1,
                'isbn' => '978-4-8156-0000-0',
                'title' => 'これからはじめるLaravel入門',
                'price' => 3800,
                'publisher' => 'SBクリエイティブ',
                'published' => '2025-10-19',
                'sample' => false
            ],
            [
                'id' => 20,
                'isbn' => '978-4-8156-1111-1',
                'title' => 'いまからはじめるLaravel入門 第2版',
                'price' => 4000,
                'publisher' => 'SBクリエイティブ',
                'published' => '2025-12-10',
                'sample' => true
            ],
        ]);
        return '挿入しました';
    }

    public function upsert()
    {
        Book::upsert([
            [
                'isbn' => '978-4-8156-0000-0',
                'title' => 'React実践入門 第2版 ',
                'price' => 4400,
                'publisher' => 'SBクリエイティブ',
                'published' => '2025-04-10',
                'sample' => false
            ],
            [
                'isbn' => '978-4-8156-0000-0',
                'title' => 'Laravel実践入門 応用編',
                'price' => 3960,
                'publisher' => 'SBクリエイティブ',
                'published' => '2025-06-30',
                'sample' => true
            ],
        ], ['isbn'], ['title']);
        return '更新しました';
    }

    public function createFirst()
    {
        Book::firstOrCreate(
            ['title' => 'これからはじめるLaravel実践入門', 'publisher' => 'SBクリエイティブ'],
            ['isbn' => '978-4-8156-2529-0', 'price' => 4000, 'published' => '2025-12-15']
        );
        return '挿入しました';
    }

    public function updateAll()
    {
        Book::where('publisher', 'SBクリエイティブ')
            ->update(['price' => DB::raw('price * 0.9')]);
        return '更新しました';
    }

    public function updateJson()
    {
        Member::where('id', 1)
            ->update(['info->sns' => 'instagram']);
        return '更新しました';
    }

    public function destroy()
    {
         Book::destroy(1);
//        Book::destroy([1, 3, 5]);
        // Book::destroy(1, 3, 5);
        return '削除しました';
    }

    public function withTrashed()
    {
        $books = Book::withTrashed()->get();
        return view('hello.list', ['books' => $books]);
    }

    public function onlyTrashed()
    {
        $books = Book::onlyTrashed()->get();
        return view('hello.list', ['books' => $books]);
    }

    public function forceDelete()
    {
        Book::where('id', 1)->forceDelete();
        return '完全に削除しました';
    }

    public function restore()
    {
        Book::where('published', '<=', now())->restore();
        // $book = Book::onlyTrashed()->find(1);
        // $book->restore();
        return '復元しました';
    }

    public function trans()
    {
        // DB::statement('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');
        DB::transaction(function () {
            Book::insertGetId([
                'isbn' => '978-4-297-15008-2',
                'title' => 'Astro フロントエンド開発の教科書',
                'price' => 3520,
                'publisher' => '技術評論社',
                'published' => '2025-07-07',
                'sample' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]);
//            throw new RuntimeException('処理中に問題が発生しました。');
            Book::insertGetId([
                'isbn' => '978-4-7981-8949-9',
                'title' => '独習Python 第2版',
                'price' => 3608,
                'publisher' => '翔泳社',
                'published' => '2025-05-14',
                'sample' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        });
        return '処理が完了しました。';
    }

}
