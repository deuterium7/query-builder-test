<?php

namespace AlexanderZabornyi\QueryBuilderTest;

class Insert extends Sql
{
    /**
     * INSERT INTO <tablename>
     *
     * @param string $table
     *
     * @return Insert
     */
    public function insert(string $table): Insert
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            'INSERT INTO %s SET %s',
            $this->table,
            join(', ', $this->set)
        );
    }
}