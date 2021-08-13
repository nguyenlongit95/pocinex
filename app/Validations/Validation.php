<?php

namespace App\Validations;

class Validation
{
    /**
     * Function validate
     *
     * @param $request
     */
    public static function validationVirualMoney($request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'buy' => 'required',
            'sell' => 'required',
        ], [
            'name.required' => 'Nhập tên đồng tiền.',
            'name.max' => 'Tên không được quá 255 ký tự.',
            'code.required' => 'Nhập code của đồng tiền.',
            'code.mã' => 'Code không được quá 255 ký tự.',
            'buy.required' => 'Nhập giá mua.',
            'sell.required' => 'Nhập giá bán.',
        ]);
    }

    /**
     * Function validate
     *
     * @param $request
     */
    public static function validationUSDVND($request)
    {
        $request->validate([
            'exchange_rate' => 'required|numeric',
        ], [
            'exchange_rate.required' => 'Nhập tỷ suất giá trị đồng tiền hôm nay.',
            'exchange_rate.numeric' => 'Bạn hãy nhập định dạng là số.',
        ]);
    }

    /**
     * Function validate
     *
     * @param $request
     */
    public static function validationArticle($request)
    {
        $request->validate([
            'name' => 'required',
            'info' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Hãy nhập tiêu đề bài viết.',
            'info.required' => 'Nhập nôi dung cơ bản của bài viết.',
            'description.required' => 'Nhập nội dung chi tiết bài viết.',
        ]);
    }
}
