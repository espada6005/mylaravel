<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Member;
use App\Models\Memo;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function belong()
    {
        return view('relation.belong', [
            'review' => Review::find(1)
        ]);
    }

    public function hasMany()
    {
        return view('relation.has_many', [
            'book' => Book::find(1)
        ]);
    }

    public function hasOne()
    {
        return view('relation.has_one', [
            'member' => Member::find(5)
        ]);
    }

    public function belongsMany()
    {
        return view('relation.belongs_many', [
            'book' => Book::find(2)
        ]);
    }

    public function hasManyThrough()
    {
        return view('relation.has_many_through', [
            'book' => Book::find(1)
        ]);
    }

    public function latestOfMany()
    {
        $member = Member::find(5);
        $latest = $member->latestReview;
        return "{$latest->body} ({$latest->created_at->format('Y-m-d')})";
    }

    public function ofMany()
    {
        $member = Member::find(3);
        return "{$member->bestReview->body}（{$member->bestReview->rate}点）";
    }

    public function pivot()
    {
        return view('relation.pivot', [
            'book' => Book::find(2),
            // 'author' => Author::find(1)
        ]);
    }

    public function morphOne()
    {
        $book = Book::find(1);
        return $book->memo->body;
    }

    public function morphMany()
    {
        return view('relation.morph_many', [
            'member' => Member::find(1)
        ]);
    }

    public function morphReverse()
    {
        $memo = Memo::find(3);
        return $memo->memoable->title;
    }

    public function morphToMany()
    {
        $book = Book::find(1);
        return view('relation.morph_to_many', [
            'book' => $book
        ]);
    }

    public function relQuery()
    {
        $book = Book::find(2);
        $reviews = $book->reviews()->where('status', 'draft')->get();
        return view('reviews.index', [
            'reviews' => $reviews
        ]);
    }

    public function orWhere()
    {
        $book = Book::find(2);
        // $reviews = $book->reviews()
        //     ->where('status', 'draft')
        //     ->orWhereNull('body')->get();

        $reviews = $book->reviews()
            ->where(function (Builder $query) {
                return $query->where('status', 'draft')
                    ->orWhereNull('body');
            })
            ->get();

        return view('reviews.index', [
            'reviews' => $reviews
        ]);
    }

    public function whereBelong()
    {
        $member = Member::find(3);
        $reviews = Review::whereBelongsTo($member)->get();
        return view('reviews.index', [
            'reviews' => $reviews
        ]);
    }

    public function whereBelongMulti()
    {
        $members = Member::whereJsonContains('roles', 'admin')->get();
        $reviews = Review::whereBelongsTo($members)->get();
        return view('reviews.index', [
            'reviews' => $reviews
        ]);
    }

    public function has()
    {
        $books = Book::has('reviews')->where('price', '>=', 3500)->get();
        // $books = Book::has('reviews', '>=', 3)->get();
        // $books = Book::whereHas('reviews', function (Builder $query) {
        //     $query->where('body', 'like', '%サンプル%');
        // })->get();
        // $books = Book::whereRelation('reviews', 'body', 'like', '%サンプル%')->get();
        return view('relation.with', ['books' => $books]);

        // $reviews = Review::has('member.author')->get();
        // return view('relation.has', [
        //     'reviews' => $reviews
        // ]);
    }

    public function whereHasMorph()
    {
        $memos = Memo::whereHasMorph(
            'memoable',
            Book::class,
            function (Builder $query) {
                $query->where('title', 'like', '%React%');
            }
        )->get();
        return view('relation.where_has_morph', ['memos' => $memos]);

        // $memos = Memo::whereHasMorph(
        //     'memoable',
        //     [Book::class, Article::class],
        //     function (Builder $query, string $type) {
        //         $col = $type === Book::class ? 'title' : 'subject';
        //         $query->where($col, 'like', '%PHP%');
        //     }
        // )->get();
        // return $memos;
    }

    public function with()
    {
//        $books = Book::all();
         $books = Book::with('reviews')->get();
        // $books = Book::with('reviews:id,body')->get();
        // $books = Book::with(['reviews', 'authors'])->get();

        // $books = Book::with(['reviews' => function ($query) {
        //     $query->whereNotNull('body');
        // }])->get();

        // $books = Book::with(['reviews' => ['member']])->get();
        // $books = Book::with('reviews.member')->get();

        // $books = Book::withWhereHas('reviews', function ($query) {
        //     $query->where('rate', '>=', 4);
        // })->get();

        // $books = Book::without('reviews')->get();
        // $books = Book::withOnly('memo')->get();
        return view('relation.with', [
            'books' => $books
        ]);
    }

    public function withCount()
    {
        $books = Book::withCount('reviews')->get();
        return view('relation.with_count', [
            'books' => $books
        ]);
    }

    public function withCountAlias()
    {
        $books = Book::withCount([
            'reviews', 'authors',
            'reviews as commented_review_count' => function (Builder $query) {
                $query->whereNotNull('body')->where('body', '<>', '');
            },
        ])->get();
        return view('relation.with_count_alias', ['books' => $books]);
    }

    public function withAvg()
    {
        $books = Book::withAvg('reviews', 'rate')->get();
        return view('relation.with_avg', ['books' => $books]);
    }

    public function save()
    {
        $book = Book::find(1);
        $review = new Review([
            'member_id' => 5,
            'status' => 'published',
            'rate' => 5,
            'body' => '解説が丁寧で、図も多く、大変参考になります。',
        ]);
        $book->reviews()->save($review);
        return 'レビューを保存しました';
    }

    public function saveMany()
    {
        $book = Book::find(1);
        $review1 = new Review([
            'member_id' => 2,
            'status' => 'published',
            'rate' => 4,
            'body' => '手元に置いておきたい1冊です。'
        ]);
        $review2 = new Review([
            'member_id' => 3,
            'status' => 'published',
            'rate' => 5,
            'body' => 'リファレンスとしても使えます。'
        ]);
        $book->reviews()->saveMany([$review1, $review2]);
        return 'レビューを保存しました';
    }

    public function create()
    {
        $book = Book::find(1);
        $book->reviews()->create([
            'member_id' => 4,
            'rate' => 5,
            'status' => 'published',
            'body' => '配布サンプルを参考に、実際に手を動かして学習しています。',
        ]);
        return 'レビューを保存しました';
    }

    public function push()
    {
        $book = Book::find(1);
        $book->reviews[0]->status = 'draft';
        $book->reviews[0]->member->email = 'hiro_s@example.com';
        $book->push();
        return 'レビューとメンバーの変更を保存しました';
    }

    public function associate()
    {
        $review = Review::find(2);
        $comment = Comment::find(1);
        $comment->review()->associate($review);
        // $comment->review()->dissociate();
        $comment->save();
        return 'コメントとレビューの紐づけを更新しました';
    }

    public function attach()
    {
        $book = Book::find(1);
        $book->authors()->attach(3);
        // $book->authors()->attach([2, 3]);
        // $book->authors()->attach(2, ['hidden' => true]);
        // $book->authors()->attach([
        //     2 => ['order' => 1],
        //     3 => ['order' => 2],
        // ]);
        return '著者を追加しました';
    }

    public function detach()
    {
        $book = Book::find(1);
        $book->authors()->detach(3);
        // $book->authors()->detach([1, 2]);
        // $book->authors()->detach();
        return '著者を削除しました';
    }

    public function sync()
    {
        $book = Book::find(1);
        $book->authors()->sync([2, 3, 5]);
        return '著者を更新しました';
    }

    public function toggle()
    {
        $book = Book::find(1);
        $book->authors()->toggle([2, 3, 5]);
        return '著者の追加/削除を切り替えました';
    }

    public function update()
    {
        $book = Book::find(2);
        $book->authors()->updateExistingPivot(1, ['hidden' => true]);
        return '著者情報を更新しました';
    }

}
