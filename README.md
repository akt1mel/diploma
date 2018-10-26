
# Дипломная работа «PHP-26»

Yii2
--------
Для программной реализации приложения был выбран фреймворк Yii2.Он реализован в соответствии с паттерном проектирования
MVC, предполагая разделение на различные компоненты частей приложения. В нем есть реализация ActiveRecord для работы с базами данных, 
которая позволяет избежать SQL инъекций при правильном использовании. Во все формы по умолчанию добавляется защита от кроссайтовых запросов. Используются готовые валидаторы как на frontend так и на backend. 
Присутствуют удобные миграции, которые позволяют отслеживать изменения в структурах таблиц.

Требования
------------

Необходим веб-сервер, поддерживающий версию PHP 5.4.0 и выше.

Структура проекта
-------------------
- **assets/** - содержит подключения ресурсов (js, css)
- **commands/** - содержит консольные команды
- **config/** - содержит конфигурационные файлы
- **controllers/** - содержит классы контроллеров
- **mail/** - содержит файлы представлений для электронной почты
- **models/** - содержит классы моделей
- **modules/** - содержит модули приложения
- **runtime/** - содержит файлы, созданные во время работы сайта (логи, кэш)
- **tests/** - содержит тесты для основных приложений
- **vendor/** - содержит фреймворк Yii и сторонние библиотеки
- **views/** - содержит файлы вида
  - **layouts/**- содержит шаблоны
  - **site/** - содержит отдельные файлы страниц
- **web/** - основная папка сайта, содержит файлы стилей, скрипты, картинки и т.д.

Установка
------------
В папке с проектом необходимо выполнить команду
~~~
git clone https://github.com/akt1mel/diploma
~~~


Далее необходимо установить зависимости с помощью Composer

~~~
composer install
~~~


Если у Вас нет [Composer](http://getcomposer.org/), то его требуется установить согласно инструкции [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

### База данных

Отредактируйте файл `config/db.php` для подключения к базе данных:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Создайте таблицы базы данных, выполнив миграции 
~~~
php yii migrate
~~~

Структура итоговой базы данных:

![База данных](https://image.ibb.co/iHHWgV/db.jpg)

### Веб-сервер

В настройках веб-сервера требуется указать `DocumentRoot "path/to/diploma/web"`



### Хостинг

Проект доступен по ссылке http://kostyavas.94.fvds.ru/

Для входа в УЗ администратора:
Login: Admin
Passw: Admin

