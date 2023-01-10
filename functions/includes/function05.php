<?php

function getTotal($n)
{
    if ($n>1) {
        $n += getTotal($n - 1);
    }

    return $n;
}

/*
Ví dụ về dãy số Fibonaci: 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89

- i = 1 => Fibonaci = 1 = fibonacci(1)
- i = 2 => fibonaci = 1 = fibonacci(2)
- i = 3 => fibonaci = 2 = fibonacci(3) = fibonacci(3-1) + fibonacci(3-2)(Có nghĩa bằng 2 số trước cộng lại)

*/

function fibonacci($n)
{
    if ($n == 1 || $n == 2) {
        return 1;
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}

/*
N = 6
- fibonacci(5) + fibonacci(4)
- fibonacci(4) + fibonacci(3) + fibonacci(3) + fibonacci(2)
- fibonacci(3) + fibonacci(2) + fibonacci(2) + fibonacci(1) + fibonacci(2) + fibonacci(1) + 1
- fibonacci(2) + fibonacci(1) + 1 + 1 + 1 + 1 + 1 + 1
- 1 + 1 + 1 + 1 + 1 + 1 + 1 + 1
*/