<?php


namespace Amir_nadjib\Todo_list\Features\ListingComments;


class ListingCommentsResponse
{
    private array $comments ;

    /**
     * ListingCommentsResponse constructor.
     * @param array $comments
     */
    public function __construct(array $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

}