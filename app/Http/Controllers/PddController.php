<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Bileti;
use App\Voprosi;
use App\Varianti;
use App\Pdd;
use App\Listpunkt;
use App\Temy;
use App\Banners;
use App\Comments;

class PddController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Developer Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public $array;
	public $arrayExam;
	
    public function __construct()
    {
        $this->middleware('guest');
		$array = []; //массив ошибок
		$arrayExam = []; //массив ошибок на экзамене
		session_start(); //запускаем сессию сессию
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
	
	/*--------N-е вопросы--------*/
	public function nVoprosy(){
		$page = Page::where('id_text', 'voprosy')->first();
		$nv = Voprosi::where('bilet', 1)->orderBy('poradok', 'asc')->get();
		/*$banner = $this->getBanner();*/
		$_SESSION["result"] = [];
		$_SESSION["resultExam"] = [];
		$_SESSION["type_menu"] = "";
		
		return view('nvoprosy', ['seo' => $page, 'nv' => $nv/*, 'banner' => $banner*/]);
	}
	
	public function nVopros($id){
		/*$banner = $this->getBanner();*/
		
		$comments = $this->getComments();
		
		if($id > 0 && $id < 21){
			$page = Bileti::where('id', $id)->orderBy('id', 'asc')->first();
			$page->name = "";

			$nv = Voprosi::where('bilet', 1)->orderBy('poradok', 'asc')->get();
			
			$voprosy = Voprosi::where('poradok', $id)->orderByRaw('RAND()')->get();
		
			foreach($voprosy as $vopros){
				$variants = Varianti::where('vopros', $vopros->id)->orderBy('id', 'asc')->get();
				$bilet = $vopros->bilet;
				break;
			}
			
			$_SESSION["result"] = [];
			$_SESSION["resultExam"] = [];
			$_SESSION["type_menu"] = "nvopros_menu";
			
			$queryLabel = "Билет ".$bilet." Вопрос ".$id;
			
			return view('nvopros', [
				'seo' => $page, 
				'nv' => $nv,
				'id' => $id,
				'voprosy' => $voprosy,
				'variants' => $variants,
				'queryLabel' => $queryLabel,
				/*'banner' => $banner,	*/
				'comments' => $comments
			]);
		}else{
			abort('404');
		}
	}	
	/*Страница с тематической таблицей*/ 
	public function tematic(){
		$bileti = Bileti::orderBy('id', 'asc')->get();
		$page = Page::where('id_text', 'tematic')->first();
		/*$banner = $this->getBanner();*/
		
		return view('tematic', ['seo' => $page, 'bileti' => $bileti/*, 'banner' => $banner*/]);
	}
	/*----------Метод главной страницы--------------*/
	public function index() {
		$bileti = Bileti::orderBy('id', 'asc')->get();
		$page = Page::where('id_text', 'index')->first();
		/*$banner = $this->getBanner();*/
		
		return view('index', ['seo' => $page, 'bileti' => $bileti/*, 'banner' => $banner*/]);	
	}
	
	/*----------Метод Страницы с последними изменениями--------------*/
	public function recentChanges() {
		$bileti = Bileti::orderBy('id', 'asc')->get();
		$page = Page::where('id_text', 'recent-changes')->first();
		/*$banner = $this->getBanner();*/
		
		return view('recentсhanges', ['seo' => $page, 'bileti' => $bileti/*, 'banner' => $banner*/]);	
	}	
	
	public function bilety() {
		$bileti = Bileti::orderBy('id', 'asc')->get();
		$page = Page::where('id_text', 'bilety')->first();
		/*$banner = $this->getBanner();*/
		$_SESSION["result"] = [];
		$_SESSION["resultExam"] = [];
		$_SESSION["type_menu"] = ""; 
		
		return view('bilety', [
			'seo' => $page,
			'bileti' => $bileti,
			/*'banner' => $banner,*/
		]);
	}
	
	public function voprosy($id) {
		$bilet = Bileti::where('id', $id)->orderBy('id', 'asc')->first();
		/*$banner = $this->getBanner();*/
		$comments = $this->getComments();
		if($bilet){
			$bileti = Bileti::orderBy('id', 'asc')->get();
			$voprosy = Voprosi::where('bilet', $id)->orderBy('poradok', 'asc')->get();
		
			foreach($voprosy as $vopros){
				if($vopros->poradok == 1){
					$variants = Varianti::where('vopros', $vopros->id)->orderBy('id', 'asc')->get();
				}
			}
	
			$_SESSION["result"] = [];
			$_SESSION["resultExam"] = [];
			$_SESSION["type_menu"] = "vopros_menu";
			
			return view('voprosy', [
				'seo' => $bilet,
				'bileti' => $bileti,
				'voprosy' => $voprosy,
				'variants' => $variants,
				'queryLabel' => "Билет ".$id." Вопрос 1",
				'bil' => $id,
				/*'banner' => $banner,*/
				'comments' => $comments 
			]);
		}else{
			abort('404');
		}
	}
	
	public function ajaxVopros() {
		$vopros = Voprosi::where('id', $_GET["ID"])->first();

		return json_encode($vopros);
	}
	
	public function ajaxOtvet() {
		$variants = Varianti::where('vopros', $_GET["ID"])->orderBy('id', 'asc')->get();
		
		return json_encode($variants);
	}
	
	public function ajaxSession() {
		$vopros = Voprosi::where('id', $_GET["V_ID"])->first();
		$variant = Varianti::where('id', $_GET["O_ID"])->orderBy('id', 'asc')->first();
		
		$array = $_SESSION["result"];
		
		$array[] = [
			'bilet' => $vopros->bilet,
			'vopros' => $vopros->poradok,
			'otvet' => $variant->name
		];
		
		$_SESSION['result'] = $array;
		
	}
	
	public function ajaxExamSession() {
		$vopros = Voprosi::where('id', $_GET["V_ID"])->first();
		$variant = Varianti::where('id', $_GET["O_ID"])->orderBy('id', 'asc')->first();
		
		$arrayExam = $_SESSION["resultExam"];
		
		$arrayExam[] = [
			'bilet' => $vopros->bilet,
			'vopros' => $vopros->poradok,
			'otvet' => $variant->name
		];
		
		$_SESSION['resultExam'] = $arrayExam;
	}
	/*Получаем меню билетов*/
	public function ajaxMenuBilety(){
		$menu = Bileti::orderBy('id', 'asc')->get();
		
		return json_encode($menu);
	}
	/*Получаем меню тем*/
	public function ajaxMenuTemy(){
		$menu = Temy::orderBy('id', 'asc')->get();
		
		return json_encode($menu);
	}	
	/*Получаем меню тем ПДД*/
	public function ajaxMenuPdd(){
		$menu = Pdd::orderBy('id', 'asc')->get();
		
		return json_encode($menu);
	}
	/*Получаем меню n-х вопросов*/
	public function ajaxMenuNv(){
		$menu = Voprosi::where('bilet', 1)->orderBy('poradok', 'asc')->get();
		
		return json_encode($menu);
	}
	
	public function errorCount() {
		$count = count($_SESSION['resultExam']);
		
		return $count;
	}
	
	public function ajaxContent() {
		$punkt = Listpunkt::where('name', $_GET['KEY'])->first();
		
		return $punkt->text;
	}
	/*Закрытый метод получает данные по вопросам
		на которые были допущены неправельные ответы
	*/
	private function e_vopros($result) {
		$e_list = [];
		
		foreach($result as $item) {
			$vopros = Voprosi::where('bilet', $item['bilet'])->where('poradok', $item['vopros'])->first();
			$varianty = Varianti::where('vopros', $vopros->id)->orderBy('id', 'asc')->get();
			
			$v_mas = [];
			
			foreach($varianty as $variant){
				$v_mas[] = [
					'v_stat' => $variant['verno'],
					'v_name' => $variant['name']
				];
			}
			
			$e_list[] = [
				'n_bilet' => $item['bilet'],
				'n_vopros' => $item['vopros'],
				'n_name' => $vopros->name,
				'n_image' => $vopros->image,
				'n_comment' => $vopros->otvet,
				'n_variant' => $v_mas
			];
		}
		
		return $e_list;
	}
	
	/*Закрытый метод получения 1-го баннера*/
	private function getBanner(){
		$banner = Banners::where('active', 1)->orderByRaw('RAND()')->first();
		
		return $banner;
	}
	
	/*Закрытый метод получения комментариев*/
	/**
	 * @Параметры нет
	 * @Возвращает 10 последних комментариев ввиде ассоциативного массива
	 * @Автор Александр Афанасьев
	 * @Copyright 2018 
	 */
	private function getComments(){
		$comments = Comments::orderBy('id', 'desc')->take(10)->get();
		
		return $comments;
	}
	
	/*Результат в билетах и темах*/
	public function result(Request $request) {
		
		$result = $_SESSION["result"];
		
		if(count($result) == 0){
			abort('404');
		}else{
			$bileti = Bileti::orderBy('id', 'asc')->get();
			$page = Page::where('id_text', 'result')->first();
			
			$errors = $this->e_vopros($_SESSION["result"]);
			
			if($_SESSION["type_menu"] == "vopros_menu"){
				$menu = Bileti::orderBy('id', 'asc')->get();
				$slug = "bilety";
			}else if($_SESSION["type_menu"] == "tema_menu"){
				$menu = Temy::orderBy('id', 'asc')->get();
				$slug = "temy";
			}else if($_SESSION["type_menu"] == "nvopros_menu"){
				$menu = Voprosi::where('bilet', 1)->orderBy('poradok', 'asc')->get();
				$slug = "voprosy";
			}
			
			return view('result', [
				'seo' => $page,
				'menu' => $menu,
				'slug' => $slug,
				'c_errors' => 'Вы допустили '.count($result).' ошибок в следующих вопросах:',
				'e_list' => $errors,
			]);
		}			
	}
	
	public function resultExam() {
		$result = $_SESSION["resultExam"];
		
		if(count($result) == 0){
			abort('404');
		}else{
			$page = Page::where('id_text', 'resultexam')->first();
			$errors = $this->e_vopros($_SESSION["resultExam"]);
			
			if($_SESSION["type_menu"] == "vopros_menu"){
				$menu = Bileti::orderBy('id', 'asc')->get();
				$slug = "bilety";
			}else if($_SESSION["type_menu"] == "tema_menu"){
				$menu = Temy::orderBy('id', 'asc')->get();
				$slug = "temy";
			}
			
			if(count($result) === 0){
				$c_errors = 'Поздравляем, экзамен сдан! Вы не допустили ошибок.';
			}else if(count($result) === 1){
				$c_errors = 'Поздравляем, экзамен сдан! Вы допустили 1 ошибку в следующем вопросе:';
			}else if(count($result) === 2){
				$c_errors = 'Поздравляем, экзамен сдан! Вы допустили 2 ошибки в следующих вопросах:';
			}else{
				$c_errors = 'Экзамен не сдан! Вы допустили 3 ошибки в следующих вопросах:';
			}
			
			return view('resultExam', [
				'seo' => $page,
				'menu' => $menu,
				'slug' => $slug,
				'c_errors' => $c_errors,
				'e_list' => $errors,
			]);	
		}			
	}
	/*Вытаскиваем из базы 5 дополнительных вопросов*/
	public function ajaxDop(){
		$dopVoprosy = [];
		
		for($i = 1; $i < 6; $i++){
			$dopVoprosy[] = Voprosi::where('poradok', $_GET["CNT"])->orderByRaw('RAND()')->take(1)->first();
		}
		
		return json_encode($dopVoprosy);	
	}
	/*----------Правила дорожного движения------------*/
	public function pdd() {
		$pdd = Pdd::orderBy('id', 'asc')->get();
		$page = Page::where('id_text', 'pdd')->first();
		/*$banner = $this->getBanner();*/
		return view('pdd', [
			'seo' => $page,
			'pdd' => $pdd,
			/*'banner' => $banner,*/
		]);		
	}
	
	public function pddThem($seokey, Request $request) {
		$them = Pdd::where('seokey', $seokey)->first();
		/*$banner = $this->getBanner();*/
		if($them){
			$listpunkts = listpunkt::where('parent_id', $them->id)->orderby('id', 'asc')->get();
			
			
			$pdd = Pdd::orderBy('id', 'asc')->get();
			$url = explode('/', $request->url());
			
			return view('pddthem', [
				'seo' => $them,
				'them' => $them,
				'listpunkt' => $listpunkts,
				'pdd' => $pdd,
				'seokey' => $url[4],
				/*'banner' => $banner,*/
			]);
		}else{
			abort('404');
		}
	}
	/*--------------------------------------------------------------*/
	
	/*-------------Вопросы по темам---------------------------------*/
	public function thems() {
		$thems = Temy::orderBy('id', 'asc')->get();
		$page = Page::where('id_text', 'temy')->first();
		/*$banner = $this->getBanner();*/
		$_SESSION["result"] = [];
		$_SESSION["resultExam"] = [];
		$_SESSION["type_menu"] = "";
		
		return view('thems', [
			'seo' => $page,
			'thems' => $thems,
			/*'banner' => $banner,*/
		]);
	}
	
	/*--------Формирование вопросов темы и данных первого вопроса------------*/
	public function them(Request $request, $id) {
		$comments = $this->getComments();
		$page = Temy::where('id', $id)->first();
		/*$banner = $this->getBanner();*/
		if($page){
			$thems = Temy::orderBy('id', 'asc')->get();
			/*Получаем все вопросы*/
			$all = Voprosi::orderBy('id', 'asc')->get();
			$voprosy = [];
			
			foreach($all as $item){
				$arr = explode(',', $item['tema']);
				if(in_array($id, $arr)){
					$voprosy[] = $item;
				}
			}
			
			$url = explode('/', $request->url()); 	
			
			foreach($voprosy as $vopros){
				$variants = Varianti::where('vopros', $vopros->id)->orderBy('id', 'asc')->get();
				break;
			}
	
			$_SESSION["result"] = [];
			$_SESSION["resultExam"] = [];
			$_SESSION["type_menu"] = "tema_menu";
			
			return view('them', [
				'seo' => $page,
				'thems' => $thems,
				'voprosy' => $voprosy,
				'variants' => $variants,
				'queryLabel' => "Билет ".$id." Вопрос 1",
				'id' => $url[4],
				/*'banner' => $banner,*/
				'comments' => $comments
			]);
		}else{
			abort('404');
		}
	}
	
	/*--------Формирование списка вопросов экзамена и вывод данных первого вопроса---------*/
	public function exam() {
		$page = Page::where('id_text', 'exam')->first();
		//$banner = $this->getBanner();
		$comments = $this->getComments();
		
		$_SESSION["result"] = [];
		$_SESSION["resultExam"] = [];
		$_SESSION["type_menu"] = "vopros_menu";
		
		$vopros = [];
		for($i = 1; $i < 21; $i++){
			$vopros[] = Voprosi::where('poradok', $i)->orderByRaw('RAND()')->take(1)->first();
		}

		foreach($vopros as $item){
			$variants = Varianti::where('vopros', $item->id)->orderBy('id', 'asc')->get();
			break;
		}
		
		return view('exam', ['seo' => $page, 'vopros' => $vopros, 'variants' => $variants, /*'banner' => $banner,*/ 'comments' => $comments]);
	}
	
	/*---------------------------МАРАФОН----------------------------*/
	public function marafon(){
		$bileti = Bileti::orderBy('id', 'asc')->get();
		$voprosy = Voprosi::orderByRaw('RAND()')->get();
		$page = Page::where('id_text', 'marafon')->first();
		//$banner = $this->getBanner();
		$comments = $this->getComments();
		
		foreach($voprosy as $vopros){
			$variants = Varianti::where('vopros', $vopros->id)->orderBy('id', 'asc')->get();
			break;
		}

		$_SESSION["result"] = [];
		$_SESSION["resultExam"] = [];
		$_SESSION["type_menu"] = "vopros_menu";
		
		return view('marafon', [
			'seo' => $page,
			'bileti' => $bileti,
			'variants' => $variants,
			'voprosy' => $voprosy,
			'queryLabel' => 'Марафон по всем вопросам всех билетов ПДД 2017',
			/*'banner' => $banner,*/
			'comments' => $comments
		]);
	}
	/*--------------------------------------------------------------*/
	/** Sampling method of the question on the number 
	 * of tickets and the number of the question. 
	 * Used to verify the integrity of the database
	 * 
	 * @return data of issue
	 */
    public function proverka(/*Request $request, */$bilet, $vopros){
        $bilet = Bileti::where('id', $bilet)->first();
		$vop = Voprosi::where('bilet', $bilet->id)->where('poradok', $vopros)->first();
		$var = Varianti::where('vopros', $vop->id)->orderBy('id', 'asc')->get();
		
        return view('proverka', [
				'num' => $vopros,
				'name' => $bilet->name,
				'vopros' => $vop->name,
				'image' => $vop->image,
				'comment' => $vop->otvet,
				'varianti' => $var,
			]
		);
    }

	/*--------------Фунекция добавляет в базу пользовательский комментарий-----------*/
	/**
	 * @Параметры отсутствуют
	 * @Возвращает пустое значение
	 * @Автор Александр Афанасьев
	 * @Copyright 2018
	 */
	public function sendComment(){
		$comment = new Comments;
		
		$comment->name = $_GET['NAME'];
		$comment->city = $_GET['CITY'];
		$comment->comment = $_GET['COMMENT'];
		
		if($comment->save()){
			echo 1;
		}else{
			echo 0;
		}
	}
}
