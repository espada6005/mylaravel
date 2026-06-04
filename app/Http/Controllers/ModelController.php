<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Article;
use App\Models\Member;
use App\Models\Review;
use App\Models\Status;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function accessorBasic()
    {
        $member = Member::find(1);
        return $member->email;
    }

    public function accessorMulti()
    {
        $member = Member::find(1);
        return $member->formatted_name;
    }

    public function mutatorBasic()
    {
        $member = Member::find(1);
        $member->email = 'WINGS-PROJECT@EXAMPLE.COM';
        $member->save();
        return "{$member->email}を登録しました。";
    }

    public function mutatorValid()
    {
        $member = Member::find(1);
        $member->email = 'hoge';
        $member->save();
        return "{$member->email}を登録しました。";
    }

    public function mutatorMulti()
    {
        $member = Member::find(1);
        $member->address = new Address('東京都', '東京市', '梅町1-1-1');
        $member->save();
        return "{$member->address->prefecture}{$member->address->city}{$member->address->other}を登録しました。";
    }

    public function castStringable()
    {
        $member = Member::find(1);
        $domain = $member->email
            ->upper()
            ->after('@')
            ->explode('.')
            ->splice(-2)
            ->join('.');
        return "ドメイン：{$domain}";
    }

    public function castEncrypt()
    {
        $article = Article::create([
            'subject' => '作っておぼえるLaravel入門',
            'body' => '実際に手を動かしてLaravelを基礎から学びます。',
            'summary' => 'Laravel入門',
        ]);
        return '登録しました。';
    }

    public function castArray()
    {
        $member = Member::find(1);
        $languages = implode(', ', $member->info['languages']);
        return <<<EOD
        性別: {$member->info['gender']}<br />
        言語: {$languages}<br />
        SNS: {$member->info['sns']}
        EOD;
    }

    public function castEnum()
    {
        $review = Review::find(1);
        $review->status = Status::Deleted;
        $review->save();
        return 'ステータスを更新しました。';
    }

    public function castAddress()
    {
        $member = Member::find(1);
        $member->address = new Address('千葉県', '千葉市', '千葉町1-1-1');
        $member->save();
        return '登録しました。';
    }

}
