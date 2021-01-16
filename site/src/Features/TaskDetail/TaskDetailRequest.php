<?php


namespace Amir_nadjib\Todo_list\Features\TaskDetail;

use stdClass ;
class TaskDetailRequest
{
   private int $taskId ;

    /**
     * TaskDetailRequest constructor.
     * @param int $taskId
     */
    public function __construct(int $taskId)
    {
        $this->taskId = $taskId;
    }

    /**
     * @return int
     */
    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public static function from(stdClass $json): self
    {
        if (empty($json->taskId)) {
            throw new MissingInputParametersException();
        }

        return new self($json->taskId);
    }


}