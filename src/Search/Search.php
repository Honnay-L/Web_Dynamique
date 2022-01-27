<?php


namespace App\Search;


class Search
{

    private $keyword;
    private $origins;

    /**
     * @return string
     */
    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     */
    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }

    /**
     * @return array
     */
    public function getOrigins(): ?string
    {
        return $this->origins;
    }

    /**
     * @param array $origins
     */
    public function setOrigins(string $origins): void
    {
        $this->origins = $origins;
    }

    public function __toString()
    {
        return (string) $this->name;
    }


}
