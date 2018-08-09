<?php

/**
 * Класс реализующий решения по задачам 1, 2, 3.
 */
class Tasks {

	/**
	 * Количество смузи, которое выпьет каждый хипстер
	 * @param int $m Общее количество смузи
	 * @param int $n Число хипстеров
	 * @return int
	 */
	public function t1_distributeSmoothies($m, $n) {
		$cntSmoothies = 0;
		if ($m >= 0 && $n > 0) {
			$cntSmoothies = floor($m / $n);
		}
		return $cntSmoothies;
	}

	/**
	 * Масса камня первого типа
	 * @var float
	 */
	private $_m1 = 0;
	/**
	 * Стоимость камня первого типа
	 * @var float
	 */
	private $_p1 = 0;
	/**
	 * Масса камня второго типа
	 * @var float
	 */
	private $_m2 = 0;
	/**
	 * Стоимость камня второго типа
	 * @var float
	 */
	private $_p2 = 0;
	/**
	 * Максимальная масса, которую можно поднять
	 * @var float
	 */
	private $_maxM = 0;

	/**
	 * Установка входных параметров для расчета по 2 задаче
	 * @param float $m1
	 * @param float $p1
	 * @param float $m2
	 * @param float $p2
	 * @param float $maxM
	 */
	public function t2_setParams($m1, $p1, $m2, $p2, $maxM) {
		if ($m1>0 && $p1>=0 && $m2>0 && $p2>=0 && $maxM>=0){
			$this->_m1	 = $m1;
			$this->_p1	 = $p1;
			$this->_m2	 = $m2;
			$this->_p2	 = $p2;
			$this->_maxM = $maxM;
		}
	}

	/**
	 * Функция расчета максимума денег, которое можно выручить, если взять не более одного камня каждого типа
	 * @return float
	 */
	public function t2_calculatePriceTypeOnce() {
		$cnt1 = $cnt2 = 1;

		return $this->_t2_calculatePrice($cnt1, $cnt2);
	}

	/**
	 * Функция расчета максимума денег, которое можно выручить, если брать сколько угодно камней каждого типа
	 * @return float
	 */
	public function t2_calculatePriceTypeMany() {
		$cnt1	 = floor($this->_maxM / $this->_m1) + 1;
		$cnt2	 = floor($this->_maxM / $this->_m2) + 1;

		return $this->_t2_calculatePrice($cnt1, $cnt2);
	}

	/**
	 * Непосредственно функция расчета максимальной стоимости взятых камней
	 * @param int $cnt1
	 * @param int $cnt2
	 * @return float
	 */
	private function _t2_calculatePrice($cnt1, $cnt2) {
		$allPsum = $curMsum = $curPsum = 0;
		for ($m1_cnt = 0; $m1_cnt <= $cnt1; $m1_cnt++) {
			for ($m2_cnt = 0; $m2_cnt <= $cnt2; $m2_cnt++) {
				$curMsum = $m1_cnt * $this->_m1 + $m2_cnt * $this->_m2;
				if ($curMsum <= $this->_maxM) {
					$curPsum = $m1_cnt * $this->_p1 + $m2_cnt * $this->_p2;
					$allPsum = max($allPsum, $curPsum);
				}
			}
		}

		return $allPsum;
	}

	/**
	 * Функция вырезки лишних скобок из сообщения со смайлами
	 * @param string $message
	 * @return string
	 */
	public function t3_Ono($message) {
		$message = preg_replace('~([:;])\(+~m', '$1(', $message);
		$message = preg_replace('~([:;])\)+~m', '$1)', $message);
		
		return $message;
	}

}
