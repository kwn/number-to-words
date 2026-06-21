<?php

namespace NumberToWords\Legacy\Numbers\Words\Locale;

use NumberToWords\Exception\NumberToWordsException;
use NumberToWords\Legacy\Numbers\Words;

class Tk extends Words
{
    const LOCALE = 'tk';
    const LANGUAGE_NAME = 'Turkmen';
    const LANGUAGE_NAME_NATIVE = 'Türkmen';

    private $minus = 'minus';

    protected $zero = 'nol';

    protected static $ten = ['', 'bir', 'iki', 'üç', 'dört', 'bäş', 'alty', 'ýedi', 'sekiz', 'dokuz'];

    protected static $tens = [
        1 => 'on',
        'ýigrimi',
        'otuz',
        'kyrk',
        'elli',
        'altmyş',
        'ýetmiş',
        'segsen',
        'togsan',
    ];

    protected static $mega = [
        '',
        '',
        'müň',
        'million',
        'milliard',
        'trillion',
        'kwadrillion',
    ];

    protected static $currencyNames = [
        'ALL' => [
            'albaniya lekasy',
            'qindarka'
        ],
        'AED' => [
            'BAE dirhamy',
            'fils'
        ],
        'AUD' => [
            'Awstraliýa dollary',
            'sent'
        ],
        'BAM' => [
            'Bosniýa markasy',
            'fenig'
        ],
        'BGN' => [
            'Bolgariýa lewasy',
            'stotinka'
        ],
        'BRL' => [
            'Brazil realy',
            'sentawo'
        ],
        'BYR' => [
            'Belarus rubly',
            'kopeýka'
        ],
        'CAD' => [
            'Kanada dollary',
            'sent'
        ],
        'CHF' => [
            'Şweýsariýa franky',
            'rapp'
        ],
        'CNY' => [
            'Hytaý ýuany',
            'fen'
        ],
        'CYP' => [
            'Kipr funty',
            'sent'
        ],
        'CZK' => [
            'Çehiýa kronasy',
            'haler'
        ],
        'DKK' => [
            'Daniýa kronasy',
            'öre'
        ],
        'DZD' => [
            'Jazaýyr dinary',
            'santim'
        ],
        'EEK' => [
            'Estoniýa kronasy',
            'sent'
        ],
        'EGP' => [
            'Müsür funty',
            'piastr'
        ],
        'EUR' => [
            'ýewro',
            'sent'
        ],
        'GBP' => [
            'britan funty',
            'pens'
        ],
        'HKD' => [
            'Gonkong dollary',
            'sent'
        ],
        'HRK' => [
            'Horwatiýa kunasy',
            'lipa'
        ],
        'HUF' => [
            'Wengriýa forinti',
            'filler'
        ],
        'IDR' => [
            'Indoneziýa rupiýasy',
            'sen'
        ],
        'ILS' => [
            'Ysraýyl şekeli',
            'agora'
        ],
        'ISK' => [
            'Islandiýa kronasy',
            'eyrir'
        ],
        'JPY' => [
            'Ýaponiýa ýenasy',
            'sen'
        ],
        'LTL' => [
            'Litwa litasy',
            'sent'
        ],
        'LVL' => [
            'Latwiýa laty',
            'santim'
        ],
        'LYD' => [
            'Liwiýa dinary',
            'dirham'
        ],
        'MAD' => [
            'Marokko dirhamy',
            'santim'
        ],
        'MKD' => [
            'Makedoniýa denary',
            'deni'
        ],
        'MRO' => [
            'Mawritaniýa ugiýasy',
            'kum'
        ],
        'MTL' => [
            'Malta lirasy',
            'sent'
        ],
        'MYR' => [
            'Malaýziýa ringiti',
            'sen'
        ],
        'NGN' => [
            'Nigeriýa naýrasy',
            'kobo'
        ],
        'NOK' => [
            'Norweçiýa kronasy',
            'öre'
        ],
        'PHP' => [
            'Filippinler pesosy',
            'sentawo'
        ],
        'PLN' => [
            'Polşa zlotasy',
            'groş'
        ],
        'ROL' => [
            'Rumyniýa leýasy',
            'ban'
        ],
        'RUB' => [
            'Russiýa rubly',
            'kopeýka'
        ],
        'SAR' => [
            'Saud Arabiýasy riýaly',
            'halala'
        ],
        'SEK' => [
            'Şwesiýa kronasy',
            'öre'
        ],
        'SIT' => [
            'Sloweniýa tolary',
            'stotin'
        ],
        'SKK' => [
            'Slowakiýa kronasy',
            'haler'
        ],
        'TMT' => [
            'manat',
            'teňňe'
        ],
        'TND' => [
            'Tunis dinary',
            'millim'
        ],
        'TRL' => [
            'Türkiýe lirasy',
            'kuruş'
        ],
        'TRY' => [
            'Türkiýe lirasy',
            'kuruş'
        ],
        'UAH' => [
            'Ukraina griwnasy',
            'kopeýka'
        ],
        'USD' => [
            'dollar',
            'sent'
        ],
        'UZS' => [
            'Özbegistan somumy',
            'tiýin'
        ],
        'XAF' => [
            'CFA franky',
            'santim'
        ],
        'XOF' => [
            'CFA franky',
            'santim'
        ],
        'XPF' => [
            'CFP franky',
            'santim'
        ],
        'YUM' => [
            'Ýugoslawiýa dinary',
            'para'
        ],
        'ZAR' => [
            'Günorta Afrika rendi',
            'sent'
        ],
    ];

    private $wordSeparator = ' ';

    /**
     * @param $number
     *
     * @return string
     * @internal param int $num
     * @internal param int $power
     *
     */
    protected function toWords($number)
    {
        if ($number === 0) {
            return $this->zero;
        }

        $out = [];

        if ($number < 0) {
            $out[] = $this->minus;
            $number *= -1;
        }

        $megaSize = count(static::$mega);
        $signs = $megaSize * 3;

        // $signs equal quantity of zeros of the biggest number in self::$mega
        // + 3 additional sign (point and two zero)
        [$unit, $subunit] = explode('.', sprintf("%{$signs}.2f", (float) $number));

        // return sprintf("%{1}.2f", (float) $number);

        foreach (str_split($unit, 3) as $megaKey => $value) {
            if (!(int) $value) {
                continue;
            }

            $megaKey = $megaSize - $megaKey - 1;
            // $gender = static::$mega[$megaKey][3];
            [$i1, $i2, $i3] = array_map('intval', str_split($value, 1));
            // mega-logic
            if ($i1 > 0) {
                $out[] = static::$ten[$i1] . ' ýüz'; # 1xx-9xx
            }

            // tens
            if ($i2 > 0) {
                $out[] = static::$tens[$i2];
            }

            // ones
            if ($i3 > 0) {
                $out[] = static::$ten[$i3];
            }

            if ($megaKey > 1) {
                $out[] = static::$mega[$megaKey];
            }
        }

        return trim(preg_replace('/\s+/', ' ', implode(' ', $out)));
    }

    /**
     * @param $currency
     * @param $decimal
     * @param null $fraction
     *
     * @return string
     * @throws NumberToWordsException
     */
    public function toCurrencyWords($currency, $decimal, $fraction = null)
    {
        $currency = strtoupper($currency);

        if (!array_key_exists($currency, static::$currencyNames)) {
            throw new NumberToWordsException(
                sprintf('Currency "%s" is not available for "%s" language', $currency, get_class($this))
            );
        }

        $currencyNames = static::$currencyNames[$currency];

        $return = $this->toWords($decimal) . ' ' . $currencyNames[0];

        if (null !== $fraction) {
            $return .= ' ' . $this->toWords($fraction) . ' ' . $currencyNames[1];
        }

        return $return;
    }
}
