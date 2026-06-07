<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
{
    // protected $stopOnFirstFailure = true;
    // protected $redirect = '/books';
    // protected $redirectRoute = 'books.index';

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => 'required|string|size:17|unique:books,isbn|regex:/^978-4-\d{1,7}-\d{1,7}-\d{1}$/',
            'title' => 'required|string|min:1|max:50',
            'price' => 'integer|max:9999',
            'publisher' => 'in:SBクリエイティブ,技術評論社,翔泳社,日経BP,森北出版',
            'published' => 'date',
            'sample' => 'boolean',
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'isbn.required' => ':attribute は必須です。',
    //         'isbn.string' => ':attribute は文字列でなければなりません。',
    //         'isbn.size' => ':attribute は:size文字でなければなりません。',
    //         'isbn.unique' => ':attribute は既に存在しています。',
    //         'isbn.regex' => ':attribute はISBNコードの形式でなければなりません。',
    //         'title.required' => ':attribute は必須です。',
    //         'title.string' => ':attribute は文字列でなければなりません。',
    //         'title.min' => ':attribute は:min文字以上でなければなりません。',
    //         'title.max' => ':attribute は:max文字以下でなければなりません。',
    //         'price.integer' => ':attribute は整数でなければなりません。',
    //         'price.max' => ':attribute は:max以下でなければなりません。',
    //         'publisher.in' => ':attribute は指定された値の中から選択してください。',
    //         'published.date' => ':attribute は日付でなければなりません。',
    //         'sample.boolean' => ':attribute は真偽値でなければなりません。',
    //     ];
    // }

    // public function attributes(): array
    // {
    //     return [ 'isbn' => 'ISBNコード', 'title' => '書名', 'price' => '価格',
    //         'publisher' => '出版社', 'published' => '刊行日', 'sample' => 'サンプル'];
    // }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'isbn' => mb_convert_kana($this->isbn, 'a'),
        ]);
    }
}
