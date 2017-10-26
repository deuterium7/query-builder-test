<?php

namespace AlexanderZabornyi\QueryBuilderTest;

abstract class Sql
{
    protected $fields = [];
    protected $where = [];
    protected $from = [];
    protected $set = [];
    protected $table;

    /**
     * FROM <tablename> as <alias>
     *
     * @param string $table
     * @param string $alias
     *
     * @return Sql
     */
    public function from(string $table, string $alias): Sql
    {
        $this->from[] = $table.' AS '.$alias;

        return $this;
    }

    /**
     * WHERE <condition>
     *
     * @param string $condition
     *
     * @return Sql
     */
    public function where(string $condition): Sql
    {
        $this->where[] = $condition;

        return $this;
    }

    /**
     * SET <params>
     *
     * @param array $params
     *
     * @return Sql
     */
    public function set(array $params): Sql
    {
        $this->set = $params;

        return $this;
    }
}