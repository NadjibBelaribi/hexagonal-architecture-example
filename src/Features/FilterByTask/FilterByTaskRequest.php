<?php


namespace Amir_nadjib\Todo_list\Features\FilterByTask;


class FilterByTaskRequest
{
    private string $hint ;

    /**
     * FilterByTaskRequest constructor.
     * @param string $hint
     */
    public function __construct(string $hint)
    {
        $this->hint = $hint;
    }

    /**
     * @return string
     */
    public function getHint(): string
    {
        return $this->hint;
    }


}