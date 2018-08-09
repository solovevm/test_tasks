<?php

header('Content-Type: text/plain; charset=utf-8');
define('N', "\r\n");

require_once('tasksClass.php');

$Tasks = new Tasks();

print "Задание 1" . N;
print "Количество смузи, которое выпьет каждый хипстер: "
	. $Tasks->t1_distributeSmoothies(100, 20)
;
print N . N;

print "Задание 2" . N;
$Tasks->t2_setParams(5.2, 5, 3.3, 3, 17.1);
//-- можно взять не более одного камня каждого типа
print "Максимум денег, если можно взять не более одного камня каждого типа: "
	. $Tasks->t2_calculatePriceTypeOnce()
;
print N;
//-- сколько угодно камней каждого типа
print "Максимум денег, если можно брать сколько угодно камней каждого типа: "
	. $Tasks->t2_calculatePriceTypeMany()
;
print N . N;

print "Задание 3" . N;
$message = "Я очень злой клоун! :(( повеселите меня...;) )))))))))))";
print "Фраза без больших смайликов:"
	. N . "старое_______сообщение: \"$message\""
	. N . "обработанное_сообщение: \"" . $Tasks->t3_Ono($message) . "\""
;
