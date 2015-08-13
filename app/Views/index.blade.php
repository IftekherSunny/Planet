@extends('layouts.default')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>Planet Framework</h1>
        <p>Open source PHP web application framework</p>
        <p>
            <a class="btn btn-primary btn-lg" href="https://github.com/IftekherSunny/Planet" role="button">Want to build Web App? &raquo;</a>
            <a class="btn btn-success btn-lg" href="https://github.com/IftekherSunny/Planet-Framework" role="button">Project Source Code &raquo;</a>
        </p>
    </div>
</div>
@if(Session::has('flash_notification.message'))
    @include('vendor.sun.flash.Flash_Message')
@endif
<div class="container">

<div class="row">
    <div class="col-md-6">
        <h2>Install via composer: </h2>
    <pre>

    composer create-project sun/planet=~1.0@beta
    </pre>
    </div>

    <div class="col-md-6">
        <h2>Install via download zip: </h2>
    <pre>
    <a href="http://planet.iftekhersunny.com/Planet-Framework.zip" class="btn btn-success "><i class="fa fa-download"></i> Download </a>
    </pre>
    </div>

</div>

<div class="row">
     <div class="col-md-6">
     <h2>Route</h2>
    <pre>
    // Get Route
    $app->get('/', function () {

        return 'Hello World!';

    });


    // Post Route
    $app->post('/', function () {

        return 'Hello World!';

    });


    // Delete Route
    $app->delete('/user/1', function () {

        return 'deleted!';

    });


    // Put Route
    $app->put('/user/1', function () {

        return 'updated!';

    });


    // Route Group
    $app->group(['filter' => 'Auth'], function () use ($app) {

        $app->get('/Home', 'HomeController@index');
        $app->get('/About', 'HomeController@about');

    });


    // Route filter
    $app->get('/', 'HomeController@index', ['filter' => 'Guest']);
    </pre>
</div>
<div class="col-md-6">
    <h2>Controller</h2>
    <pre>
    class HomeController extends Controller
    {
        /**
         * To show home page
         *
         * @return \Sun\View\View
         */
        public function index()
        {
            return View::render('index');
        }
    }
    </pre>

    <h2>Form Validator</h2>
    <pre>
    $validate = Validator::validate([
        'email' => [Request::input('email'), 'required'],
        'password' => [Request::input('password'), 'required']
    ]);

    if ($validate->fails()) {

        return Redirect::backWith('errors', $validate->errors()->all());
    }
    </pre>

    <h2>Console Command</h2>
    <pre>
    php planet list            [ list of commands ]
    php planet run             [ start built-in server ]
    php planet app:name        [ change app namespace ]
    php planet app:key         [ set app key ]
    php planet make:alien      [ create alien ]
    php planet make:command    [ create command bus ]
    php planet make:console    [ create console command ]
    php planet make:model      [ create model ]
    php planet make:controller [ create controller ]
    php planet make:filter     [ create filter ]
    php planet session:clear   [ clear session files ]
    php planet view:clear      [ clear compiled view ]
    </pre>
            </div>
        </div>

<div class="row">
    <div class="col-md-6">
    <h2>Alien</h2>

    <pre>
    // Built in Alien
    'Csrf'          => 'Sun\Alien\CsrfAlien',
    'File'          => 'Sun\Alien\FilesystemAlien',
    'Flash'         => 'Sun\Alien\FlashAlien',
    'Hash'          => 'Sun\Alien\HashAlien',
    'Mail'          => 'Sun\Alien\MailerAlien',
    'Redirect'      => 'Sun\Alien\RedirectAlien',
    'Request'       => 'Sun\Alien\RequestAlien',
    'Response'      => 'Sun\Alien\ResponseAlien',
    'Session'       => 'Sun\Alien\SessionAlien',
    'Validator'     => 'Sun\Alien\ValidatorAlien',
    'View'          => 'Sun\Alien\ViewAlien',
    </pre>
</div>

<div class="col-md-6">
    <h2>Custom Alien</h2>
    <pre>
    class CustomAlien extends \Sun\Alien
    {
        /**
         * To register Alien
         *
         * @return string namespace
         */
        public static function registerAlien()
        {
            return 'App\Custom';
        }
    }
    </pre>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <h2>Helper Functions</h2>
    <div class="col-sm-6">
    <pre>
    app()
    app_path()
    base_path()
    config_path()
    storage_path()
    public_path()
    csrf_token();
    config();
    view();
    </pre>
    </div>
    <div class="col-sm-6">
    <pre>
    url();
    redirect();
    request();
    response();
    validator();
    bcrypt();
    bcrypt_verify();
    encrypt();
    decrypt();
    </pre>
    </div>
</div>

<div class="col-md-6">
    <h2>Flash Message</h2>
    <pre>
    Flash::success('Hello');
    Flash::error('Whoops! There were some problems with your input.');
    Flash::info('your message');
    Flash::warning('your message');
    Flash::confirm('Message Title', 'Your Message');
    Flash::overlay('Message Title', 'Your Message');
    </pre>
</div>
</div>

<div class="row">
    <div class="col-md-6">
    <h2>Filters</h2>
    <pre>
    Guest, Auth, Csrf
    </pre>

    <h2>Email</h2>
    <pre>
    // basic email
    Mail::send('name@example.com', 'name', 'Subject', 'Body');

    // email with html view
    $body = view('emailTemplate', [ 'data' => $data ]);
    Mail::send('name@example.com', 'name', 'Subject', $body);
    </pre>
</div>
    <div class="col-md-6">
    <h2>Custom Filter</h2>
    <pre>

    class CustomFilter extends \Sun\Routing\Filter
    {
        /**
         * To handle request
         */
        public function handle()
        {
            if(\Session::has('login')) {
                \Redirect::to('/home');
            }
        }
    }
    </pre>
</div>
</div>
<div class="row">
    <div class="col-md-6">
    <h2>Filesystem</h2>
    <pre>
    // create file
    File::create(storage_path().'/app/file.txt', 'your file content');

    // delete file
    File::delete(storage_path().'/app/file.txt');

    // Check file exists
    File::exists(storage_path().'/app/file.txt');

    // update file
    File::update(storage_path().'/app/file.txt', 'your content');

    // to get file content
    File::get(storage_path().'/app/file.txt');

    // append file
    File::append(storage_path().'/app/file.txt', 'your content');

    // copy file
    File::copy(storage_path().'/app/file.txt',
                storage_path().'/app/newFile.txt');

    // move file
    File::move(storage_path().'/app/file.txt',
                storage_path().'/file.txt');

    // to get file size
    File::size(storage_path().'/app/file.txt');

    // to get all files in a directory
    File::files(storage_path().'/app);

    // to get all directories in a directory
    File::directories(storage_path().'/app');

    // create directory
    File::createDirectory(storage_path().'/app');

    // delete directory
    File::deleteDirectory(storage_path().'/app');

    // clean directory
    File::CleanDirectory(storage_path().'/app');

    // to check is file
    File::isFile(storage_path().'/app/file.txt');

    // to check is directory
    File::isDir(storage_path() . '/app');
    </pre>
    </div>
    <div class="col-md-6">
    <h2>Session</h2>
    <pre>
    // create session
    Session::Create('mySession', 'content');

    // to get session content
    Session::get('mySession');

    // delete session
    Session::delete('mySession');

    // to check session exists
    Session::has('mySession');

    // to get session content & delete this session
    Session::pull('mySession');

    // to push session data in the session array
    Session::push('myArraySession', 'content');

    // to pop session data from the session array
    Session::pull('myArraySession');

    // to shift session data from the session array
    Session::shift('myArraySession');

    // destroy all session data
    Session::destroy();
    </pre>
    <h2>Contracts</h2>
    <pre>
    Sun\Contracts\Bus\CommandTranslator
    Sun\Contracts\Bus\Dispatcher
    Sun\Contracts\Database\Database
    Sun\Contracts\Filesystem\Filesystem
    Sun\Contracts\Http\Redirect
    Sun\Contracts\Http\Request
    Sun\Contracts\Http\Response
    Sun\Contracts\Mail\Mailer
    Sun\Contracts\Routing\UrlGenerator
    Sun\Contracts\Security\Csrf
    Sun\Contracts\Security\Encrypter
    Sun\Contracts\Security\Hash
    Sun\Contracts\Session\Session
    Sun\Contracts\Support\Config
    Sun\Contracts\Validation\Validator
    Sun\Contracts\View\View

    </pre>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
    <h2>Binding</h2>
    <pre>
    <b>You can register your own binding.</b>

    // by calling function
    app()->bind('App\Contracts\UserContract', 'App\Model\User');

    // by adding namespace in the config/binding.php file
    'App\Contracts\UserContract'   => 'App\Model\User',
    </pre>
    </div>
    <div class="col-md-6">
    <h2>ORM & Templates</h2>
    <pre>
    In this framework I used Laravel ORM & Blade templates.

    Learn More: <br />
    <a href="http://laravel.com/docs/5.1/eloquent" class="btn btn-xs btn-primary">Laravel ORM</a> <a href="http://laravel.com/docs/5.1/blade" class="btn btn-xs btn-danger">Blade templates</a>


    </pre>
    </div>
</div>
<div class="row">
    <br/><br/>
    <hr>
    <footer>
        <p>&copy; <a href="https://www.facebook.com/profile.php?id=100002837300191">IftekherSunny</a> {{ date('Y') }}</p>
    </footer>
</div>
</div>
@stop