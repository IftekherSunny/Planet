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

<div class="container">

<div class="row">
    <div class="col-md-6">
        <h2>Install via composer: </h2>
    <pre>

    composer create-project sun/planet=v1.0-beta.1
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
            </div>
        </div>

<div class="row">
    <div class="col-md-6">
    <h2>Alien</h2>

    <pre>
    // Built in Alien

    'View'          => 'Sun\Alien\ViewAlien',
    'Request'       => 'Sun\Alien\RequestAlien',
    'Redirect'      => 'Sun\Alien\RedirectAlien',
    'Response'      => 'Sun\Alien\ResponseAlien',
    'Csrf'          => 'Sun\Alien\CsrfAlien',
    'Hash'          => 'Sun\Alien\EncrypterAlien',
    'Validator'     => 'Sun\Alien\ValidatorAlien',
    'File'          => 'Sun\FilesystemAlien',
    'Mail'          => 'SunMailer\MailerAlien',
    'Flash'         => 'Sun\FlashAlien',
    'Session'       => 'Sun\SessionAlien',
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
    <pre>
    csrf_token();
    config();
    view();
    redirect();
    request();
    response();
    validator();
    url();
    </pre>
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
    <br/><br/>
    <hr>
    <footer>
        <p>&copy; <a href="https://www.facebook.com/profile.php?id=100002837300191">IftekherSunny</a> {{ date('Y') }}</p>
    </footer>
</div>
</div>
@stop