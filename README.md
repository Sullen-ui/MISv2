1. Создание БД (+)
2. Создание связей и отношений (+)
2.1 Заполнение в порядке (seed) 




<img src="https://user-images.githubusercontent.com/82956250/116987450-e6d85d80-acf0-11eb-8fa1-025dcf15d0a7.png" style="width:100%" />

Создать seed (добаление одной записи в таблицу за раз)
    
    php artisan make:seeder UserSeeder

Войти в UserSeeder
подключить Str для последующей генерации рандомной строки

    use Illuminate\Support\Str;
    
Из фасадов подключить DB для обращения к базе

    use Illuminate\Support\Facades\DB;
    
Далее функция
<p>
 public function run()<br>
      {<br>
              DB::table('branches')->insert([<br>
              'name' => Str::random(10),<br>
             'Service_status' => rand(0,1),<br>
             'Short_name' => Str::random(5),<br>
          ]);<br>
      }
    </p>
После чего запускаем seed

     php artisan db:seed --class=BranchTableSeeder
    
Результат:

![image](https://user-images.githubusercontent.com/82956250/117044004-bb289800-ad2f-11eb-9018-2e5aaa6151ba.png)

Запуск наполнения БД (Вся тестовая база)

     php artisan db:seed




3. Создание вьюшек
    -Меню
    -Регистрация пациента
    -База пациентов
    -Расписание
    -Доктор
   Модальные окна 
5. Подключение форм
6. Описание моделей и контроллеров

..аутентификация

----------------------------------------------------------------------------------------------------------------------------------------------


Аутентификация

composer require laravel/ui

php artisan ui vue --auth

npm install && npm run dev

npm run dev



1.Создаем роуты /home и /email-confirm

	В миграцию добавить поле email_status =  (0/1)
			0 - /email-confirm
			1 - /home

	php artisan migrate:refresh

2. Создать посредника

        php artisan make:middleware Confirmed
        //приписать его к /home 
        php artisan make:middleware Noconfirmed
        //приписать его к /email-confirm 

4.Создать контроллер для страниц

	php artisan make:controller PagesController


Kernel -  добавляем путь к посреднику

4.PagesController вьюшки прописать в методах

5.Создать вьюшки

6.
use Auth
В мидлах сделать проверку поля email_status


  a). Если email_status = 0 
		return redirect()->route('email');


  б). Если email_status = 1
		return redirect()->route('home');


---------------------------------------------------------------------------
Правильный пул

    composer install

    env - переименовать

    php artisan key:generate

    php artisan serve
