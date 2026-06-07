<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', ['books' => Book::all()]);
        // return view('books.index_while', ['books' => Book::all()]);
        // return view('books.index_for', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', ['book' => new Book]);
    }

    /**\
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|string|size:17|unique:books,isbn|regex:/^978-4-\d{1,7}-\d{1,7}-\d{1}$/',
            // 'isbn' => 'bail|string|size:17|unique:books,isbn|regex:/^978-4-\d{1,7}-\d{1,7}-\d{1}$/',
            // 'isbn' => ['required', 'string',  'unique:books,isbn', new Isbn()],
            // 'isbn' => ['required', 'string', 'unique:books,isbn', new Isbn(true)],
            // 'isbn' => ['required', 'string', 'unique:books,isbn', new MultiIsbn],

            // MultiIsbnルールをクロージャー形式で書き換えた場合
            // 'isbn' => [
            //     'required',
            //     'string',
            //     'unique:books,isbn',
            //     function (string $attribute, mixed $value, Closure $fail) use ($request) {
            //         $published = $request->date('published');
            //         if ($published->greaterThanOrEqualTo(Carbon::parse('2007-01-01'))) {
            //             $pattern = '/^978-4-\d{1,7}-\d{1,7}-\d{1}$/';
            //             $len = 17;
            //         } else {
            //             $pattern = '/^4-\d{1,7}-\d{1,7}-[\dX]{1}$/';
            //             $len = 13;
            //         }
            //         if (!(preg_match($pattern, $value) && strlen($value) === $len)) {
            //             $fail(':attribute はISBNコードの形式でなければなりません。');
            //         }
            //     }
            // ],
            'title' => 'required|string|min:1|max:50',
            'price' => 'integer|max:9999',
            'publisher' => 'in:SBクリエイティブ,技術評論社,翔泳社,日経BP,森北出版',
            'published' => 'date',
            // 'published' => 'required|after:today',
            // 'published' => [
            //     'required',
            //     Rule::date()->after(today()->addMonths(1)),
            // ],
            // 'published' => [
            //     'required',
            //     Rule::date()->todayOrAfter()
            //                 ->before(today()->addYears(5)),
            // ],
            'sample' => 'boolean',
        ]);


        // バリデーションルールを配列で指定
        // $validated = $request->validate([
        //     'isbn' => ['required', 'string', 'size:17', 'unique:books,isbn', 'regex:/^978-4-\d{1,7}-\d{1,7}-\d{1}$/'],
        //     'title' => ['required', 'string', 'min:1', 'max:50'],
        //     'price' => ['integer', 'max:9999'],
        //     'publisher' => ['in:SBクリエイティブ,技術評論社,翔泳社,日経BP,森北出版'],
        //     'published' => ['date'],
        //     'sample' => ['boolean'],
        // ]);

        $book = new Book();
        $book->fill($validated)->save();
        // Log::debug('"{title}" is saved.', ['title' => $book->title]);

        // $book->isbn = $request->isbn;
        // $book->title = $request->title;
        // $book->price = $request->price;
        // $book->publisher = $request->publisher;
        // $book->published = $request->published;
        // $book->sample = $request->sample;
        // $book->save();

        // return to_route('books.index')
        //     ->with('success', "「{$book->title}」の登録に成功しました。");

        // return to_route('books.index')
        //     ->with([
        //       'success' => "「{$book->title}」の登録に成功しました。",
        //       'current' => time()
        //     ]);

        // $request->session()->flash('success', "「{$book->title}」の登録に成功しました。");
        return to_route('books.index');
    }

    // リクエストフォームを利用する場合
    // public function store(BookFormRequest $request): RedirectResponse
    // {
    //     $book = new Book();
    //     $book->fill($request->validated())->save();
    //     return to_route('books.index');
    // }

    // createメソッドを利用する場合
    // public function store(Request $request)
    // {
    //     $book = Book::create($request->only('isbn', 'title', 'price',
    //         'publisher', 'published', 'sample'));
    //     return to_route('books.index');
    // }

    /**
     * Display the specified resource.
     */
    public function show(int $book)
    {
        $b = Book::find($book);
        // $b = Book::findOr($book, ['*'], function () {
        //     abort(404);
        // });
        // $b = Book::findOrFail($book);
        return view('books.show', ['book' => $b]);
    }

    // public function show(Book $book)
    // {
    //     return view('books.show', ['book' => $book]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->fill($request->only('isbn', 'title', 'price',
            'publisher', 'published', 'sample'))->save();

        return to_route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return to_route('books.index');
    }
}
