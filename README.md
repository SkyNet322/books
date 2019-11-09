# Книги

> Тестовый проект

## Установка

+ Выполнить `docker-compose up -d`
+ Установить зависимости: `docker-compose exec web php composer.phar install` (может потребоваться ввод github token'a)
+ Запустить миграции: `docker-compose exec web php yii migrate`
+ Создать модератора для доступа к административной части, передав логин и пароль: `docker-compose exec web php yii moderator/register $user $password` (в случае успех вернется токен для доступа к api)

## Использование

+ Зайти на http://localhost:8888
+ Залогиниться с помощью созданного выше аккаунта модератора
+ Создать автора(-ов)
+ Создать книгу(-и)
+ Перейти на главную страницу, увидеть список книг

## Api

+ `GET http://localhost:8888/api/v1/books/list` - получить список книг с автором
+ `GET http://localhost:8888/api/v1/books/by-id/id` -  получить данные книги по id
+ `POST http://localhost:8888/api/v1/books/update` - обновить данные книги (требуется токен модератора)
+ `DELETE http://localhost:8888/api/v1/books/delete/id` - удалить запись книги из бд (требуется токен модератора)