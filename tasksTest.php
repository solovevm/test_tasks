<?php
/**
 * Файл для тестирования задач 1, 2.
 * Запуск теста:
 * $> phpunit --bootstrap /vendor/autoload.php tasksTest
 */

//-- подключаем класс с заданиями
require 'tasksClass.php';

use PHPUnit\Framework\TestCase;

final class TasksTests extends TestCase {

	private $tasks;

	protected function setUp() {
		$this->tasks = new Tasks();
	}

	protected function tearDown() {
		$this->tasks = null;
	}

	/**
	 * Массив данных для проверки 1 задачи
	 * @return array
	 */
	public function task1_DataProvider() {
		return [
			[100, 20, 5],
			[1, 123, 0],
			[-1, -1, 0],
			[19, 0, 0],
		];
	}

	/**
	 * Функция проверки ожидаемых результатов по задаче 1
	 * @dataProvider task1_DataProvider
	 */
	public function testT1_distributeSmoothies($a, $b, $expected) {
		$result = $this->tasks->t1_distributeSmoothies($a, $b);
		$this->assertEquals($expected, $result);
	}

	/**
	 * Массив данных для проверки 2 задачи первого условия
	 * @return array
	 */
	public function task2_1_DataProvider() {
		return [
			[20, 5, 3, 1, 120, 6],
			[1.2, 4, 1.3, 5, 1.1, 0],
			[5.2, 5, 3.3, 3, 17.1, 8]
		];
	}

	/**
	 * Массив данных для проверки 2 задачи второго условия
	 * @return array
	 */
	public function task2_2_DataProvider() {
		return [
			[20, 5, 3, 1, 120, 40],
			[1.2, 4, 1.3, 5, 1.1, 0],
			[5.2, 5, 3.3, 3, 17.1, 16]
		];
	}

	/**
	 * Функция проверки ожидаемых результатов по задаче 2 первого условия
	 * @dataProvider task2_1_DataProvider
	 */
	public function testT2_calculatePriceTypeOnce($m1, $p1, $m2, $p2, $maxM, $expected) {
		$this->tasks->t2_setParams($m1, $p1, $m2, $p2, $maxM, $expected);
		$result = $this->tasks->t2_calculatePriceTypeOnce();
		$this->assertEquals($expected, $result);
	}

	/**
	 * Функция проверки ожидаемых результатов по задаче 2 второго условия
	 * @dataProvider task2_2_DataProvider
	 */
	public function testT2_calculatePriceTypeMany($m1, $p1, $m2, $p2, $maxM, $expected) {
		$this->tasks->t2_setParams($m1, $p1, $m2, $p2, $maxM, $expected);
		$result = $this->tasks->t2_calculatePriceTypeMany();
		$this->assertEquals($expected, $result);
	}

}
