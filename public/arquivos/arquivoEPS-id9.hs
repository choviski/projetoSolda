somaPares 0 = 0
somaPares x =  if rem x 2 ==0 then x+somaPares(x-1) else somaPares(x-1);

fibonacci 0 = 0;
fibonacci 1 = 1;
fibonacci 2 = 1;
fibonacci x = (fibonacci (x-1)) + (fibonacci (x-2));


multiComSoma x y = if (y==0) then 0 else multiComSoma x (y-1) +x;

primo2 y x = if(x-1 == 1) then True else if(x-1 > 2 && rem y (x-1) == 0) then False else primo2 y (x-1);

primo x = if(x-1 == 1) then True else if(x-1 > 2 && rem x (x-1) == 0) then False else primo2 x x;