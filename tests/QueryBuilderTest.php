<?php

namespace AlexanderZabornyi\QueryBuilderTest\Tests;

use AlexanderZabornyi\QueryBuilderTest\Select;
use AlexanderZabornyi\QueryBuilderTest\Insert;
use AlexanderZabornyi\QueryBuilderTest\Update;
use AlexanderZabornyi\QueryBuilderTest\Delete;
use PHPUnit\Framework\TestCase;

class QueryBuilderTest extends TestCase
{
    public function testQueryBuilderSelect()
    {
        $query = (new Select())
            ->select(['foo', 'bar'])
            ->from('foobar', 'f')
            ->where('f.bar = ?');

        $this->assertEquals('SELECT foo, bar FROM foobar AS f WHERE f.bar = ?', (string) $query);
    }

    public function testQueryBuilderInsert()
    {
        $query = (new Insert())
            ->insert('foobar')
            ->set(['col1 = val1', 'col2 = val2']);

        $this->assertEquals('INSERT INTO foobar SET col1 = val1, col2 = val2', (string) $query);
    }

    public function testQueryBuilderUpdate()
    {
        $query = (new Update())
            ->update('foobar')
            ->set(['col1 = val2', 'col2 = val1'])
            ->where('id = 1');

        $this->assertEquals('UPDATE foobar SET col1 = val2, col2 = val1 WHERE id = 1', (string) $query);
    }

    public function testQueryBuilderDelete()
    {
        $query = (new Delete())
            ->from('foobar','f')
            ->where('id = 1');

        $this->assertEquals('DELETE FROM foobar AS f WHERE id = 1', (string) $query);
    }
}