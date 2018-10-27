<?php

namespace NumberToWords\TransformerOptions;

class CurrencyTransformerOptions
{
    private $convertFraction = true;
    private $convertFractionIfZero = true;
    private $showDecimalIfZero = false;
    private $showFractionIfZero = false;

    /**
     * @return bool
     */
    public function isConvertFraction()
    {
        return $this->convertFraction;
    }

    /**
     * @param bool $convertFraction
     *
     * @return self
     */
    public function setConvertFraction($convertFraction)
    {
        $this->convertFraction = $convertFraction;

        return $this;
    }

    /**
     * @return bool
     */
    public function isConvertFractionIfZero()
    {
        return $this->convertFractionIfZero;
    }

    /**
     * @param bool $convertFractionIfZero
     *
     * @return self
     */
    public function setConvertFractionIfZero($convertFractionIfZero)
    {
        $this->convertFractionIfZero = $convertFractionIfZero;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShowDecimalIfZero()
    {
        return $this->showDecimalIfZero;
    }

    /**
     * @param bool $showDecimalIfZero
     *
     * @return self
     */
    public function setShowDecimalIfZero($showDecimalIfZero)
    {
        $this->showDecimalIfZero = $showDecimalIfZero;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShowFractionIfZero()
    {
        return $this->showFractionIfZero;
    }

    /**
     * @param bool $showFractionIfZero
     *
     * @return self
     */
    public function setShowFractionIfZero($showFractionIfZero)
    {
        $this->showFractionIfZero = $showFractionIfZero;
        
        return $this;
    }
}
