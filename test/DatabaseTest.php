<?php
require './src/Database.php';
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    /** @group db */
    public function testMockProductsAreReturned()
    {
        $mockRepo = $this->createMock(Database::class);

        $mockProductsArray = [
            ['id' => 1, 'name' => 'Samsung Galaxy Fold 4'],
            ['id' => 2, 'name' => 'Apple IPhone 14 promax'],
        ];

        $mockRepo->method('resultSet')->willReturn($mockProductsArray);

        $products = $mockRepo->resultSet();


        $this->assertEquals('Samsung Galaxy Fold 4', $products[0]['name']);
        $this->assertEquals('Apple IPhone 14 promax', $products[1]['name']);
    }
}
       
