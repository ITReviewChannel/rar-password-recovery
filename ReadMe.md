RarPasswordRecovery
===

Расширение Rar
---

Для работы скрипта понадобится [расширение Rar](https://www.php.net/manual/ru/rar.installation.php "Документация PHP").

Настройка PHP
---
Для удобства обновите настройки времени выволнения скрипта и лимита памяти в php.ini:

`max_execution_time=36000`

`memory_limit = 4000M`

Пароли
---

Для генерации файлов со словарями паролей удобно использовать Crunch.

[Crunch для Windows](https://github.com/shadwork/Windows-Crunch/releases "Crunch для Windows").

Crunch для Linux:

> wget https://sourceforge.net/projects/crunch-wordlist/files/latest/download -O crunch-.tgz

> tar xvzf crunch-*.tgz

> cd crunch-*/

> sudo make PREFIX=/usr INSTALL_OPTIONS=geninstall

> ./crunch

> sudo make install

> crunch

Пример подбора
---

Ситуации с отгадыванием пароля бывают разные. В данном случае примерный пароль был известен. Владелец архива
ошибся дважды при его вводе и нужно было перебрать возможные ошибочные варианты.

Ориентировочный пароль - `password`

**Генерация словарей**

`crunch 8 8 "qwertyuiopasdfghjklzxcvbnm " -t "@@ssword" -o dictionary_1.txt`

`crunch 8 8 "qwertyuiopasdfghjklzxcvbnm " -t "p@@sword" -o dictionary_2.txt`

`crunch 8 8 "qwertyuiopasdfghjklzxcvbnm " -t "pa@@word" -o dictionary_3.txt`

`crunch 8 8 "qwertyuiopasdfghjklzxcvbnm " -t "pas@@ord" -o dictionary_4.txt`

`crunch 8 8 "qwertyuiopasdfghjklzxcvbnm " -t "pass@@rd" -o dictionary_5.txt`

`crunch 8 8 "qwertyuiopasdfghjklzxcvbnm " -t "passw@@d" -o dictionary_6.txt`

`crunch 8 8 "qwertyuiopasdfghjklzxcvbnm " -t "passwo@@" -o dictionary_7.txt`

**Запуск перебора в 7 потоках**

`php recovery_1.php`

`php recovery_2.php`

`php recovery_3.php`

`php recovery_4.php`

`php recovery_5.php`

`php recovery_6.php`

`php recovery_7.php`

Ограничение
---

Расширение Rar работает только с паролями на **английском** языке.