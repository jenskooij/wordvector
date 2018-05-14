<?php
/**
 * Created by jensk on 14-5-2018.
 */

namespace JensKooij\WordVector;


class ResultModel
{
    protected $words = array();

    /**
     * Add a relatedWord related to a word, based on its appearance with
     * the window of the word
     *
     * @param $word
     * @param $relatedWord
     */
    public function addRelatedWord($word, $relatedWord)
    {
        if (isset($this->words[$word][$relatedWord])) {
            $this->words[$word][$relatedWord] += 1;
        } else {
            $this->words[$word][$relatedWord] = 1;
        }
    }

    /**
     * Returns an array of related keywords, ordered by the number of times a related
     * word has appeared within the window of the input
     * @param $input
     * @return array
     */
    public function getRelatedWordsFor($input)
    {
        if (isset($this->words[$input])) {
            arsort($this->words[$input]);
            return $this->words[$input];
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