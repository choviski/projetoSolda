p,d,n = input().split()
p=int(p)
d=int(d)
n=int(n)
b=0
aux=0
for i in range(n):
    a=int(input())
    if(a-b>=p):
        aux=1
    b=a
if(d-b>=p):
    aux=1
if(n==0):
    if(p<=d):
        print("Y")
    else:
        print("N")
else:
    if(aux==0):
        print("N")
    else:
        print("Y")
