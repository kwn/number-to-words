<?php

namespace NumberToWords\Language\Turkish;

class Dictionary
{
    const LOCALE = 'tr';
    const LANGUAGE_NAME = 'Turkish';
    const LANGUAGE_NAME_NATIVE = 'Türkçe';
    const MINUS = 'eksi';

    public static $wordSeparator = ' ';

    public static $zero = 'sıfır';

    public static $units = ['', 'bir', 'iki', 'üç', 'dört', 'beş', 'altı', 'yedi', 'sekiz', 'dokuz'];

    public static $teens = [
        'on',
        'onbir',
        'oniki',
        'onüç',
        'ondört',
        'onbeş',
        'onaltı',
        'onyedi',
        'onsekiz',
        'ondokuz'
    ];

    public static $tens = [
        '',
        'on',
        'yirmi',
        'otuz',
        'kırk',
        'elli',
        'altmış',
        'yetmiş',
        'seksen',
        'doksan'
    ];

    public static $hundred = 'yüz';

    public static $exponent = [
        '',
        'bin',
        'milyon',
        'milyar',
        'trilyon',
        'katrilyon',
        'kentilyon',
        'seksilyon',
        'septilyon',
        'oktilyon',
        'nonilyon',
        'desilyon',
        'undesilyon',
        'dodesilyon',
        'tredesilyon',
        'katordesilyon',
        'kendesilyon',
        'seksdesilyon',
        'septendesilyon',
        'oktodesilyon',
        'novemdesilyon',
        'vigintilyon',
    ];

    private static $currencyNames = [
        'ALL' => [['lek'], ['qindarka']],
        'AUD' => [['Avusturalya doları'], ['sent']],
        'BAM' => [['convertible marka'], ['fenig']],
        'BGN' => [['Bulgar levası'], ['stotinka', 'stotinki']],
        'BRL' => [['real'], ['centavos']],
        'BWP' => [['Botswana pulası'], ['thebe']],
        'BYR' => [['Belarus rublesi'], ['kopiejka']],
        'CAD' => [['Kanada doları'], ['sent']],
        'CHF' => [['İsveç frankı'], ['rapp']],
        'CNY' => [['Çin yuanı'], ['fen']],
        'CYP' => [['Kıbrıs pound\'u'], ['sent']],
        'CZK' => [['Çek kronu'], ['halerz']],
        'DKK' => [['Danmarka kronu'], ['ore']],
        'EEK' => [['kroon'], ['senti']],
        'EUR' => [['Avro'], ['Avro-sent']],
        'GBP' => [['pound', 'pound'], ['pence', 'pence']],
        'HKD' => [['Hong Kong doları'], ['sent']],
        'HRK' => [['Hırvatistan kunası'], ['lipa']],
        'HUF' => [['Macar forinti'], ['filler']],
        'ILS' => [['yeni sheqel', 'yeni sheqels'], ['agora', 'agorot']],
        'ISK' => [['Izlanda kronu'], ['aurar']],
        'JPY' => [['Japon yeni'], ['sen']],
        'LTL' => [['Litvanya litası'], ['sent']],
        'LVL' => [['Letonya latı'], ['sentim']],
        'MKD' => [['Makedonya dinarı'], ['deni']],
        'MTL' => [['Malta lirası'], ['centym']],
        'NOK' => [['Norveç kronu'], ['oere']],
        'PLN' => [['zloty', 'zlotys'], ['grosz']],
        'ROL' => [['Romanya leu'], ['bani']],
        'RUB' => [['Ruble'], ['kopiejka']],
        'SEK' => [['İsveç kronu'], ['oere']],
        'SIT' => [['Tolar'], ['stotinia']],
        'SKK' => [['Slovakya kronu'], []],
        'TRY' => [['Türk Lirası'], ['kuruş']],
        'UAH' => [['Ukrayna hryvnyası'], ['kopiyka']],
        'USD' => [['ABD Doları'], ['sent']],
        'YUM' => [['dinar'], ['para']],
        'ZAR' => [['Güney Afrika randı'], ['sent']]
    ];
}
