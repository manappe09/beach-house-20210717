<?php

namespace App\Consts;

class ProductsConst
{
  const demo = 'this is demo';

  const ID_BLUEHAWAII = 'K01';
  const ID_STRAWBERRY = 'K02';
  const ID_MELLON = 'K03';

  public static $products_list = [
      'K01' => [
        'name' => 'ブルーハワイ',
        'text' => '人気No.1！かき氷といえばやっぱりこれ。海に映える青いやつ！',
        'price' => '200',
        'category' => 'kakigori',
        'image' => 'miffy.jpg',
      ],
      'K02' => [
        'name' => 'イチゴ',
        'text' => '老若男女誰にでも愛される安定の味。日常に戻りたくなったらこいつだ！',
        'price' => '200',
        'category' => 'kakigori',
        'image' => 'miffy.jpg',
      ],
      'K03' => [
        'name' => 'メロン',
        'text' => 'ほどよい甘みと酸味でスッキリ爽快！おいしいよ。',
        'price' => '200',
        'category' => 'kakigori',
        'image' => 'miffy.jpg',
      ],
    ];
};


// 項目ごとに出し分けるパターン
// {
//   const demo = 'this is demo';

//   const ID_BLUEHAWAI = 'K01';
//   const ID_STRAWBERRY = 'K02';
//   const ID_MELLON = 'K03';

//   public static $products_name = [
//       self::ID_BLUEHAWAI => 'ブルーハワイ',
//       self::ID_STRAWBERRY => 'イチゴ',
//       self::ID_MELLON => 'メロン',
//     ];

//   public static $products_image = [
//       self::ID_BLUEHAWAI => 'miffy.jpg',
//       self::ID_STRAWBERRY => 'miffy.jpg',
//       self::ID_MELLON => 'miffy.jpg',
//     ];

//   public static $products_text = [
//       self::ID_BLUEHAWAI => '人気No.1！かき氷といえばやっぱりこれ。海に映える青いやつ！',
//       self::ID_STRAWBERRY => '老若男女誰にでも愛される安定の味。日常に戻りたくなったらこいつだ！',
//       self::ID_MELLON => 'ほどよい甘みと酸味でスッキリ爽快！おいしいよ。',
//     ];

//   public static $products_price = [
//       self::ID_BLUEHAWAI => 200,
//       self::ID_STRAWBERRY => 200,
//       self::ID_MELLON => 200,
//     ];

//   public static $products_category = [
//       self::ID_BLUEHAWAI => 'kakigori',
//       self::ID_STRAWBERRY => 'kakigori',
//       self::ID_MELLON => 'kakigori',
//     ];
// };