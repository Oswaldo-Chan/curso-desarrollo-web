<?php include 'includes/header.php';

$n1 = 40;

echo $n1++; //incrementa despues
echo ++$n1; //incrementa primero

echo $n1--; //decrementa despues
echo --$n1; //decrementa primero

$num = 10;

echo $num += 5;//incrementa 5 primero
echo $num -= 5;//decrementa 5 primero
echo $num *= 10;
echo $num /= 10;

include 'includes/footer.php';