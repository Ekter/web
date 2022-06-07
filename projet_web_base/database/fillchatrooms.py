import random
alphabet="abcdefghijklmnopqrstuvwxyz"
names=["Moi","tarzan","hello","l'autre","celui là",]


for _ in range(150):
    
    i=""
    e="."
    for _ in range(10):
        i+=random.choice(alphabet)
        e+=random.choice(alphabet)
    
    name="chatrooms/chatroom"+i+str(random.randint(0,100000))+e
    i=random.randint(0,150)
    with open(name,"w") as f:
        for _ in range(i):
            new_var = random.randint(1,20)
            for _ in range(new_var):
                i+=random.choice(alphabet)
            f.write(random.choice(names)+":"+"\n")
        f.write(name+"\n")

