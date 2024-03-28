import os
import shutil
import glob
import time

# 1. Перемещение в папку ./client
os.chdir("./client")

# 2. Выполнение команды npm run build
os.system("npm run build")

# 3. Выход на каталог выше
os.chdir("../")

time.sleep(2)

# 4. Удаление папок js, css и файла index.html
shutil.rmtree("./js", ignore_errors=True)
shutil.rmtree("./css", ignore_errors=True)
os.remove("./index.html")

time.sleep(2)

# 5. Создание символических ссылок
os.system("ln -s ./client/dist/* ./")

# 6. Нахождение файла и замена строки
replacement_string = "https://gazlike.webnet.kz"
for file_path in glob.glob("./js/app.*.js"):
    with open(file_path, "r") as file:
        data = file.read()

    data = data.replace("http://localhost:8081", replacement_string)

    with open(file_path, "w") as file:
        file.write(data)
