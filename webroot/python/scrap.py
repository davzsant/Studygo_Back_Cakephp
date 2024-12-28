import json
import random
import time

data = {
    "message": "Hi Davide",
    "value": random.randint(1,100)
}
time.sleep(5)
print(json.dumps(data))

