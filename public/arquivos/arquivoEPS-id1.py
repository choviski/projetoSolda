p= int(input())
v = []
indices = []
for i in range(p):
    a,b=map(int,input().split())
    v.append((a,b))
aux = v[0][0]
aux2=0
cont=0
while(len(v)>0):
    aux2=0
    base = aux + 10
    cu = v[0][1]
    v.pop(0)
    for i in range(len(v)):
        if(v[i][0]<base and cu == v[i][1]):
            aux=10+v[i][0]
            indices.append(i)
            aux2=1
            cont=cont+1
    for i in range(len(indices)-1,-1,-1):
        if(len(v)!=0):
            v.pop(indices[i])
    if(aux2==0):
        if(len(v)!=0):
            if(v[0][0]>base):
                aux=v[0][0]
            else:
                aux=base

if(p-1==cont):
    print(aux)
else:
    print(base)