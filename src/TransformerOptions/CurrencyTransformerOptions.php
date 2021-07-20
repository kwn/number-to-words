<?php

namespace NumberToWords\TransformerOptions;

class CurrencyTransformerOptions
{
    private bool $convertFraction = true;
    private bool $convertFractionIfZero = true;
    private bool $showDecimalIfZero = false;
    private bool $showFractionIfZero = false;

    public function isConvertFraction(): bool
    {
        return $this->convertFraction;
    }

    public function setConvertFraction(bool $convertFraction): self
    {
        $this->convertFraction = $convertFraction;

        return $this;
    }

    public function isConvertFractionIfZero(): bool
    {
        return $this->convertFractionIfZero;
    }

    public function setConvertFractionIfZero(bool $convertFractionIfZero): self
    {
        $this->convertFractionIfZero = $convertFractionIfZero;

        return $this;
    }

    public function isShowDecimalIfZero(): bool
    {
        return $this->showDecimalIfZero;
    }

    public function setShowDecimalIfZero(bool $showDecimalIfZero): self
    {
        $this->showDecimalIfZero = $showDecimalIfZero;

        return $this;
    }

    public function isShowFractionIfZero(): bool
    {
        return $this->showFractionIfZero;
    }

    public function setShowFractionIfZero(bool $showFractionIfZero): self
    {
        $this->showFractionIfZero = $showFractionIfZero;

        return $this;
    }
}
