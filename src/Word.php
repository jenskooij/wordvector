<?php
/**
 * Created by jensk on 14-5-2018.
 */

namespace JensKooij\WordVector;


class Word
{
    protected $word;
    protected $window = array();
    protected $samples;

    /**
     * Word constructor.
     * @param string $word
     */
    public function __construct($word)
    {
        $this->word = $word;
    }

    public function addToWindow($word)
    {
        if ($word !== $this->word && !empty($word)) {
            $this->window[] = $word;
        }
    }

    public function getSamples()
    {
        if ($this->samples !== null) {
            return $this->samples;
        }

        $samples = array();

        foreach($this->window as $word) {
            $samples[] = array($this->word, $word);
        }

        $this->samples = $samples;
        return $this->samples;
    }
}