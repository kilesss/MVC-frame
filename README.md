# MVC-frame

this is my version of PHP MVC Framework , its verry similar to laravel 4+ framework.
inside i place one simple framework writed on Perl, currently it use for Youtube Downloader, but he can to use for frame to execute difference Perl algoritms or Web spiders. 
This framework is created for personal needes . Some of functionalities may be adopted for the security hole. 
Тhe need for this system is to use a local server for smart home, it is not intended for public access. However, it can be set part of it be used for public access (via routings)


Two frameworks is currently uneder construction and i work on it in my free time.


PHP framework documentation: 
  Routing: 
    We have currently 5 request methods : GET, POST, DELETE, UPDATE and CONSOLE.
    first 4 is standart request from Rest API, the 5 method is use for execute a files on diferent languages by terminal execution .
     
     Структурата на рутинга е както следва :
     
      $routes = array(
        array("GET","home", "home@index"),
      );
        във функцията  all_routes  в файла routes.php 
        има масив $routes които сдържа под масиви като всеки под масив е различна заявка . Структурата на тези под масиви е следната : 
        първия елемент отговаря на типа заявка , втория отговаря на зададеното урл , а третия отговаря към кой контролер и коя фунцкия да         води (home- контролер index-функция във контролера).
        при групирането на рутинги синтаксиса е следния : първия елемент показва че е група , втория линка който води към групата и третия          за роутингите който са във тази група.
         
         Като параметри в урлто има няколко правила за подаване на данни : 
          {}- добавяне на 1 стойност ;
          {}? - добавяне на 1 стойност, но стойността може и да липсва; 
          {[]}- добавяне на няколко стойности (като лементи на масив )
          в всеки израз се поставя опреденело име на променлива към която се предава стойността подадена чрез урл . Пример {id}?
              TO DO : UPDATE and CONSOLE methods is currently on under construction 

–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
       Контролери и Модели : 
          За да създадете контролер и модел се изпълнява в конзолата командата php terminal.php controller create името на контролера , 
          това създава контролер и модел с даденото име и необходимите му наследявания и фунционалности.
          Контролера наслядва класа BaseConroller който се грижи за извикването на модела който отговаря този клас , както и за        извикванията на различните виюта и подаването им на променливи . 
          TO DO :  за в бъдеще трябва да се вкара възможност за извикване на други модели към дадения клас както и да се създаде конфигурационен файл за различни опции като например дебгинг мода да смарти , кеширанията в смарти и жизнения им цикъл 
          
          Извикването на определено вию от контролер става по следния начин : 
          self::View('index', $view);
           като index е файла който се извиква , а $view е масив с параметри които му се подават . Пример : $view = array('users'=> $users['query'],'pages'=>$users['pages']);
         
         извикването на функция от модела става с следния синтаксис : 
          $this->db-> фукцията която ни е нужна ;
          Пример: 
         $user = $this->db->getUserInfo($_GET['id']);
          
          Модел: 
          Модела основно наследява библиотеката за базите данни което позволява по лесното извикване и използване на различните функции от тази библиотека. 
          TO DO: Да се вкара библиотека за работа и с MongoDB  както и да се конфигурира към моделите  
