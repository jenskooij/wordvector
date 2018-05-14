<?php
/**
 * Created by jensk on 14-5-2018.
 */

namespace JensKooij\WordVector;


class ResultModel
{
    protected $words = array();

    public function addSimilarWord($word, $similarWord)
    {
        if (isset($this->words[$word][$similarWord])) {
            $this->words[$word][$similarWord] += 1;
        } else {
            $this->words[$word][$similarWord] = 1;
        }
    }

    public function getSimilarWordsFor($word)
    {
        if (isset($this->words[$word])) {
            arsort($this->words[$word]);
            return $this->words[$word];
        }
        return array();
    }

    /**
     * @return array
     */
    public function getWords()
    {
        return $this->words;
    }
}