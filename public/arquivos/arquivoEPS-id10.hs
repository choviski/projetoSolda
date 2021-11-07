incremento x =    x + 1

quadratica x = x**2

par x = x `mod` 2 == 0

impar x = not(par x)

maior x y = if(x > y) then (x) else (y)

maior2 x y z = if((maior x y)>z) then (maior x y) else (z)

maior3 x y z = if  x > y then (if x > z then x else z)
               else (if y > z then y else z)

maior4 x y z = maior (maior x y) z

modulo x = if x >= 0 then x else x*(-1)

positivo x
     |x>=0 = True
     |x<0 = False

diaSemana 1 = "Domingo"
diaSemana 2 = "Segunda"
diaSemana 3 = "Terca"
diaSemana 4 = "Quarta"
diaSemana 5 = "Quinta"
diaSemana 6 = "Sexta"
diaSemana 7 = "Sabado"
diaSemana d = "ERRO, TENTE NOVAMENTE VAGABUNDO"


int2string x
    |x == 1 = "Domingo"
    |x == 2 = "Segunda"
    |x == 3 = "Terca"
    |x == 4 = "Quarta"
    |x == 5 = "Quinta"
    |x == 6 = "Sexta"
    |x == 7 = "Sabado"
    |otherwise = "ERRO, TENTE NOVAMENTE VAGABUNDO"

fatorial 0 = 1
fatorial x = x * fatorial (x-1)

somatorio 0 = 0
somatorio x = somatorio (x-1) + x


somatorio2 x y = if x > y then 0 else x + somatorio2 (x+1) y
