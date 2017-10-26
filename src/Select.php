<?php

namespace AlexanderZabornyi\QueryBuilderTest;

class Select extends Sql
{
    /**
     * SELECT <fields>
     *
     * @param array $fields
     *
     * @return Select
     */
    public function select(array $fields): Select
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            join(', ', $this->fields),
            join(', ', $this->from),
            join(' AND ', $this->where)
        );
    }
}