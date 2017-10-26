<?php

namespace AlexanderZabornyi\QueryBuilderTest;

class Update extends Sql
{
    /**
     * UPDATE <tablename>
     *
     * @param string $table
     *
     * @return Update
     */
    public function update(string $table): Update
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
            'UPDATE %s SET %s WHERE %s',
            $this->table,
            join(', ', $this->set),
            join(' AND ', $this->where)
        );
    }
}