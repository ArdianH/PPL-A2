 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    class Captcha extends CI_Controller
    {
    function __construct()
    {
    parent::__construct();
    $this->load->helper('captcha');
    $this->load->helper('url');
    }
     
    function index()
    {
    $vals = array(
    'img_path' => './captcha/',
    'img_url' => base_url().'/captcha/',
	'font_path' => './font/timesbd.ttf',
    'img_width' => 150,
    'img_height' => '50',
    'expiration' => 7200
    );
     
    $cap = create_captcha($vals);
    print_r($cap['word']);
    echo $cap['image'];
	echo random_string('alnum', 16);
    }
    }
     
    ?>