<?php
App::uses('AppController', 'Controller');
class ForUeditorController extends AppController {
	
	public $autoLayout = false;
	
	public $components = array('Uploader'); 
	
	function beforeFilter(){
		if ( $this->action == 'js' || $this->action == 'css' || $this->action == 'images' ) {
			return;
		}
		
	}
	public function index() {
		//error_reporting(E_ERROR);
		$serverBaseURL =  $this->request->webroot; // /myBlog/
		//WWW_ROOT // // D:\wamp\www\myBlog\app\webroot\ 
		$CONFIG = array(
			"serverBaseURL"=> $serverBaseURL,
			"www_root" => WWW_ROOT,
			"imageActionName" => "uploadimage",
			"imageFieldName" => "upfile",
			"imageMaxSize" => 2048000,
			"imageAllowFiles" => 
				array (".png",".jpg",".jpeg",".gif",".bmp"),
			"imageCompressEnable" => true,
			"imageCompressBorder" => 1600,
			"imageInsertAlign" => "none",
			"imageUrlPrefix" => "",
			"imagePathFormat" => "ueditor/php/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}",
			"scrawlActionName" => "uploadscrawl",
			"scrawlFieldName" => "upfile",
			"scrawlPathFormat" => "ueditor/php/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}",
			"scrawlMaxSize" => 2048000,
			"scrawlUrlPrefix" => "",
			"scrawlInsertAlign" => "none",
			"snapscreenActionName" => "uploadimage",
			"snapscreenPathFormat" => "ueditor/php/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}",
			"snapscreenUrlPrefix" => "",
			"snapscreenInsertAlign" => "none",
			"catcherLocalDomain" => 
				array("127.0.0.1","localhost","img.baidu.com"),
			"catcherActionName" => "catchimage",
			"catcherFieldName" => "source",
			"catcherPathFormat" => "ueditor/php/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}",
			"catcherUrlPrefix" => "",
			"catcherMaxSize" => 2048000,
			"catcherAllowFiles" => 
				array(".png",".jpg",".jpeg",".gif",".bmp"),
			"videoActionName" => "uploadvideo",
			"videoFieldName" => "upfile",
			"videoPathFormat" => "ueditor/php/upload/video/{yyyy}{mm}{dd}/{time}{rand:6}",
			"videoUrlPrefix" => "",
			"videoMaxSize" => 102400000,
			"videoAllowFiles" => 
				array(".flv",".swf",".mkv",".avi",".rm",".rmvb",".mpeg",".mpg",".ogg",".ogv",".mov",".wmv",".mp4",".webm",".mp3",".wav",".mid"),
			"fileActionName" => "uploadfile",
			"fileFieldName" => "upfile",
			"filePathFormat" => "ueditor/php/upload/file/{yyyy}{mm}{dd}/{time}{rand:6}",
			"fileUrlPrefix" => "",
			"fileMaxSize" => 51200000,
			"fileAllowFiles" => 
				array(".png",".jpg",".jpeg",".gif",".bmp",".flv",".swf",".mkv",".avi",".rm",".rmvb",".mpeg",".mpg",".ogg",".ogv",".mov",".wmv",".mp4",".webm",".mp3",".wav",".mid",".rar",".zip",".tar",".gz",".7z",".bz2",".cab",".iso",".doc",".docx",".xls",".xlsx",".ppt",".pptx",".pdf",".txt",".md",".xml"),
			"imageManagerActionName" => "listimage",
			"imageManagerListPath" => "ueditor/php/upload/image/",
			"imageManagerListSize" => 20,"imageManagerUrlPrefix" => "",
			"imageManagerInsertAlign" => "none",
			"imageManagerAllowFiles" => 
				array(".png",".jpg",".jpeg",".gif",".bmp"),
			"fileManagerActionName" => "listfile",
			"fileManagerListPath" => "ueditor/php/upload/file/",
			"fileManagerUrlPrefix" => "",
			"fileManagerListSize" => 20,
			"fileManagerAllowFiles" => 
				array(
				".png",".jpg",".jpeg",".gif",
				".bmp",".flv",".swf",".mkv",".avi",
				".rm",".rmvb",".mpeg",".mpg",".ogg",
				".ogv",".mov",".wmv",".mp4",".webm",
				".mp3",".wav",".mid",".rar",".zip",".tar",
				".gz",".7z",".bz2",".cab",".iso",".doc",
				".docx",".xls",".xlsx",".ppt",".pptx",
				".pdf",".txt",".md",".xml")
		);
		
		$action = isset($_GET['action']) ? $_GET['action'] : '';

		switch ($action) {
			case 'config':
			$result =  json_encode($CONFIG);
				break;
			/* 上传图片 */
			case 'uploadimage':
			/* 上传涂鸦 */
			case 'uploadscrawl':
			/* 上传视频 */
			case 'uploadvideo':
			/* 上传文件 */
			case 'uploadfile':
				//$result = include("action_upload.php");
				$result = $this->action_upload($CONFIG);
				break;
			/* 列出图片 */
			case 'listimage':
				//$result = include("action_list.php");
				$result = $this->action_list($CONFIG);
				break;
			/* 列出文件 */
			case 'listfile':
				//$result = include("action_list.php");
				$result = $this->action_list($CONFIG);
				break;
			/* 抓取远程文件 */
			case 'catchimage':
				$result =  $this->action_crawler($CONFIG);// include("action_crawler.php");
				break;
			default:
				$result = json_encode(array(
					'state'=> '请求地址出错'
				));
				break;
		}
		/* 输出结果 */
		if (isset($_GET["callback"])) {
			if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
				echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
			} else {
				echo json_encode(array(
						'state'=> 'callback参数不合法'
						));
			}
		} else {
			echo $result;
		}
		$this->render('/Elements/ajaxreturn'); 
	}
	
	public function action_crawler($CONFIG){
		//set_time_limit(0);
		//include("Uploader.class.php");
		
		/* 上传配置 */
		$config = array(
		    "pathFormat" => $CONFIG['catcherPathFormat'],
		    "maxSize" => $CONFIG['catcherMaxSize'],
		    "allowFiles" => $CONFIG['catcherAllowFiles'],
		    "oriName" => "remote.png"
		);
		$fieldName = $CONFIG['catcherFieldName'];
		
		/* 抓取远程图片 */
		$list = array();
		if (isset($_POST[$fieldName])) {
		    $source = $_POST[$fieldName];
		} else {
		    $source = $_GET[$fieldName];
		}
		foreach ($source as $imgUrl) {
		    //$item = new Uploader($imgUrl, $config, "remote");
		    $info = $this->Uploader->andUpload($imgUrl, $config, "remote");
		    //$info = $this->Uploader->getFileInfo();
		    array_push($list, array(
		        "state" => $info["state"],
		        "url" => $info["url"],
		        "size" => $info["size"],
		        "title" => htmlspecialchars($info["title"]),
		        "original" => htmlspecialchars($info["original"]),
		        "source" => htmlspecialchars($imgUrl)
		    ));
		}
		
		/* 返回抓取数据 */
		return json_encode(array(
		    'state'=> count($list) ? 'SUCCESS':'ERROR',
		    'list'=> $list
		));
	}
	
	
	public function action_list($CONFIG){
		//include "Uploader.class.php";

		/* 判断类型 */
		switch ($_GET['action']) {
		    /* 列出文件 */
		    case 'listfile':
		        $allowFiles = $CONFIG['fileManagerAllowFiles'];
		        $listSize = $CONFIG['fileManagerListSize'];
		        $path = $CONFIG['fileManagerListPath'];
		        break;
		    /* 列出图片 */
		    case 'listimage':
		    default:
		        $allowFiles = $CONFIG['imageManagerAllowFiles'];
		        $listSize = $CONFIG['imageManagerListSize'];
		        $path = $CONFIG['imageManagerListPath'];
		}
		$allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);
		
		/* 获取参数 */
		$size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
		$start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
		$end = $start + $size;
		
		/* 获取文件列表 */
		$path = $CONFIG['www_root'] . $path;
		$files = $this->getfiles($CONFIG,$path, $allowFiles);
		if (!count($files)) {
		    return json_encode(array(
		        "state" => "no match file",
		        "list" => array(),
		        "start" => $start,
		        "total" => count($files)
		    ));
		}
		
		/* 获取指定范围的列表 */
		$len = count($files);
		for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
		    $list[] = $files[$i];
		}
		//倒序
		//for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
		//    $list[] = $files[$i];
		//}
		
		/* 返回数据 */
		$result = json_encode(array(
		    "state" => "SUCCESS",
		    "list" => $list,
		    "start" => $start,
		    "total" => count($files)
		));
		
		return $result;
	}
	
	public function action_upload($CONFIG){
		//include "Uploader.class.php";
		/* 上传配置 */
		$base64 = "upload";
		switch (htmlspecialchars($_GET['action'])) {
			case 'uploadimage':
				$config = array(
					"pathFormat" => $CONFIG['imagePathFormat'],
					"maxSize" => $CONFIG['imageMaxSize'],
					"allowFiles" => $CONFIG['imageAllowFiles']
				);
				$fieldName = $CONFIG['imageFieldName'];
				break;
			case 'uploadscrawl':
				$config = array(
					"pathFormat" => $CONFIG['scrawlPathFormat'],
					"maxSize" => $CONFIG['scrawlMaxSize'],
					//"allowFiles" => $CONFIG['scrawlAllowFiles'],
 					"oriName" => "scrawl.png"
				);
				$fieldName = $CONFIG['scrawlFieldName'];
				$base64 = "base64";
				break;
			case 'uploadvideo':
				$config = array(
					"pathFormat" => $CONFIG['videoPathFormat'],
					"maxSize" => $CONFIG['videoMaxSize'],
					"allowFiles" => $CONFIG['videoAllowFiles']
				);
				$fieldName = $CONFIG['videoFieldName'];
				break;
			case 'uploadfile':
			default:
				$config = array(
 					"pathFormat" => $CONFIG['filePathFormat'],
					"maxSize" => $CONFIG['fileMaxSize'],
					"allowFiles" => $CONFIG['fileAllowFiles']
				);
				$fieldName = $CONFIG['fileFieldName'];
				break;
		}
		$config['serverBaseURL'] = $CONFIG['serverBaseURL'];
		$config['www_root'] = $CONFIG['www_root'];
		//$this->log(json_encode($fieldName));
		//$this->log(json_encode($base64));
	//	$this->log(json_encode($config));
		/* 生成上传实例对象并完成上传 */
		//$up = new Uploader($fieldName, $config, $base64);
		$arr = $this->Uploader->andUpload($fieldName, $config, $base64);
		/**
		 * 得到上传文件所对应的各个参数,数组结构
		 * array(
		 *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
		 *     "url" => "",            //返回的地址
		 *     "title" => "",          //新文件名
		 *     "original" => "",       //原始文件名
		 *     "type" => ""            //文件类型
		 *     "size" => "",           //文件大小
		 * )
		 */
		//$this->log("---"+print_r($_FILES));
		/* 返回数据 */
		//return json_encode($up->getFileInfo());
		$this->log(json_encode($arr));
		return json_encode($arr);
	}
	



	/**
	 * 遍历获取目录下的指定类型的文件
	 * @param $path
	 * @param array $files
	 * @return array
	 */
	function getfiles($CONFIG,$path, $allowFiles, &$files = array()){
	    if (!is_dir($path)) return null;
	    if(substr($path, strlen($path) - 1) != '/') $path .= '/';
	    $handle = opendir($path);
	    while (false !== ($file = readdir($handle))) {
	        if ($file != '.' && $file != '..') {
	            $path2 = $path . $file;
	            if (is_dir($path2)) {
	                $this->getfiles($CONFIG,$path2, $allowFiles, $files);
	            } else {
	                if (preg_match("/\.(".$allowFiles.")$/i", $file)) {
	                	$this->log(filemtime($path2));
	                	$url = $CONFIG['serverBaseURL'].substr($path2, strlen($CONFIG['www_root']));
	                    $files[] = array(
	                        'url'=> $url,
	                        'mtime'=> filemtime($path2)
	                    );
	                }
	            }
	        }
	    }
	    return $files;
	}
}