<?php

namespace App\Consts;

class ProductsConst
{
  const demo = 'this is demo';

  const ID_BLUEHAWAII = 'K01';
  const ID_STRAWBERRY = 'K02';
  const ID_MELLON = 'K03';

  public static $products_list = [
    // @TODO: 変数で書き換え
      'K01' => [
        'name' => 'ブルーハワイ',
        'text' => '人気No.1！かき氷といえばやっぱりこれ。海に映える青いやつ！',
        'price' => '200',
        'category' => 'kakigori',
        'image' => 'kakigori_bluehawaii.png',
        // MIX_IMAGE_SOURCEで書き換え
        // 'image' => 'kakigori_bluehawaii.png',
      ],
      'K02' => [
        'name' => 'イチゴ',
        'text' => '老若男女誰にでも愛される安定の味。日常に戻りたくなったらこいつだ！',
        'price' => '200',
        'category' => 'kakigori',
        'image' => 'kakigori_ichigo.png',
      ],
      'K03' => [
        'name' => 'メロン',
        'text' => 'ほどよい甘みと酸味でスッキリ爽快！おいしいよ。',
        'price' => '200',
        'category' => 'kakigori',
        'image' => 'kakigori_melon.png',
      ],
      'K04' => [
        'name' => 'チョコレート',
        'text' => 'ミルクチョコソースに、チョコチップの乗ったおいしいかき氷。',
        'price' => '250',
        'category' => 'kakigori',
        'image' => 'kakigori_chocolate.png',
      ],
      'K05' => [
        'name' => '魅惑のレインボー',
        'text' => '暑さも吹き飛ぶ！キラキラかき氷！',
        'price' => '300',
        'category' => 'kakigori',
        'image' => 'kakigori_rainbow.png',
      ],
      'T01' => [
        'name' => 'ポテチ(箸付き)',
        'text' => '作業しながらの養分補給に。 PCが汚れないように箸付きだ！',
        'price' => '300',
        'category' => 'tsumami',
        'image' => 'tsumami.png',
      ],
      'T02' => [
        'name' => '焼き鳥',
        'text' => '片手で手軽にタンパク質を補給しよう！',
        'price' => '400',
        'category' => 'tsumami',
        'image' => 'tsumami.png',
      ],
      'T03' => [
        'name' => '盛りキャベツ',
        'text' => '野菜はキャベツに決まり！ムシャムシャ食べよう。',
        'price' => '500',
        'category' => 'tsumami',
        'image' => 'tsumami.png',
      ],
      'G01' => [
        'name' => '豚チャーハン',
        'text' => '野菜も入って栄養満点！こだわりの煮豚を使用。',
        'price' => '650',
        'category' => 'gohan',
        'image' => 'gohan.png',
      ],
      'G02' => [
        'name' => '醤油ラーメン',
        'text' => '基本のラーメン！こってりが続くと戻りたくなる原点。',
        'price' => '700',
        'category' => 'gohan',
        'image' => 'gohan.png',
      ],
      'G03' => [
        'name' => '牛丼セット',
        'text' => '〇〇屋にも引けを取らない安定の旨さ・安さ・早さ！',
        'price' => '950',
        'category' => 'gohan',
        'image' => 'gohan.png',
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