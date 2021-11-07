incremento :: Int -> Int
incremento x =    x + 1

quadratica x = x**2

par x = x `mod` 2 == 0

impar x = not(par x)

maior x y = if(x > y) then (x) else (y)

maior2 x y z = if((maior x y)>z) then (maior x y) else (z)

maior3 x y z = if  x > y then (if x > z then x else z) 
               else (if y > z then y else z)

maior4 x y z = maior (maior x y) z