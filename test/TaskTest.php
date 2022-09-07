<?php
require_once './src/Task.php';
require_once './src/Database.php';
use PHPUnit\Framework\TestCase;

  class TaskTest extends TestCase {

    public function testGetAllTasks() {

      $table = array(
        array(
            'id' => '1',
            'Name' => 'Fairtrade Pocket Hoodie',
            'Price' => '64.95',
            'ImageUrl' => 'p-1.jpg'
        ),
        array(
            'id' => '12',
            'Name' => 'Graduation Tie',
            'Price' => '79.99',
            'ImageUrl' => 'p-12.jpg'
        )
      );

      $dbase = $this->getMockBuilder('Database')
        ->getMock();

      $dbase->method('resultSet')
          ->will($this->returnValue($table));

      $expectedResult = [[
                            'id' => '1',
                            'Name' => 'Fairtrade Pocket Hoodie',
                            'Price' => '64.95',
                            'ImageUrl' => 'p-1.jpg'
                          ],
                          [
                            'id' => '12',
                            'Name' => 'Graduation Tie',
                            'Price' => '79.99',
                            'ImageUrl' => 'p-12.jpg'
                          ],
      ];

      $task = new Task();
      $actualResult =  $task->getAllTasks();

      $this->assertEquals($expectedResult[0], $actualResult[0]);
      $this->assertEquals($expectedResult[1], $actualResult[11]);

    }
}