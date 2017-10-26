<?php

namespace AlexanderZabornyi\QueryBuilderTest;

class Delete extends Sql
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            'DELETE FROM %s WHERE %s',
            join(', ', $this->from),
            join(' AND ', $this->where)
        );
    }
}